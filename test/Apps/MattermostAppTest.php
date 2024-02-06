<?php

namespace Apps;

use CedricZiel\MattermostPhp\Apps\AppPermission;
use CedricZiel\MattermostPhp\Apps\Bindings\LocationBinding;
use CedricZiel\MattermostPhp\Apps\Call;
use CedricZiel\MattermostPhp\Apps\HttpDeploymentDescriptor;
use CedricZiel\MattermostPhp\Apps\Location;
use CedricZiel\MattermostPhp\Apps\MattermostApp;
use CedricZiel\MattermostPhp\Context;
use CedricZiel\MattermostPhp\Request;
use Http\Discovery\Psr17Factory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(MattermostApp::class)]
class MattermostAppTest extends TestCase
{
    private Psr17Factory $psrFactory;

    public function setUp(): void
    {
        parent::setUp();

        $this->psrFactory = new Psr17Factory();
    }

    public static function provideApps(): array
    {
        return [
            [
                'simple app',
                MattermostApp::create('test', 'Test', 'https://example.com')
                    ->withHttp(HttpDeploymentDescriptor::create('https://example.com')),
                '{"path":"/bindings","context":{"app_id":"","mattermost_site_url":"https://mattermost.com","developer_mode":true,"app_path":"/plugins/com.mattermost.apps/apps/com.cedricziel.mm-bot-dev","bot_user_id":"123","bot_access_token":"abc","oauth2":{}}}'
            ],
            [
                'app with on_install',
                MattermostApp::create('test', 'Test', 'https://example.com')
                    ->withHttp(HttpDeploymentDescriptor::create('https://example.com'))
                    ->withOnInstall(new Call('test')),
                '{"path":"/bindings","context":{"app_id":"","mattermost_site_url":"https://mattermost.com","developer_mode":true,"app_path":"/plugins/com.mattermost.apps/apps/com.cedricziel.mm-bot-dev","bot_user_id":"123","bot_access_token":"abc","oauth2":{}}}'
            ],
            [
                'app with on_uninstall',
                MattermostApp::create('test', 'Test', 'https://example.com')
                    ->withHttp(HttpDeploymentDescriptor::create('https://example.com'))
                    ->withOnInstall(new Call('test')),
                '{"path":"/bindings","context":{"app_id":"","mattermost_site_url":"https://mattermost.com","developer_mode":true,"app_path":"/plugins/com.mattermost.apps/apps/com.cedricziel.mm-bot-dev","bot_user_id":"123","bot_access_token":"abc","oauth2":{}}}'
            ],
            [
                'app with on_version_changed',
                MattermostApp::create('test', 'Test', 'https://example.com')
                    ->withHttp(HttpDeploymentDescriptor::create('https://example.com'))
                    ->withOnVersionChanged(new Call('test')),
                '{"path":"/bindings","context":{"app_id":"","mattermost_site_url":"https://mattermost.com","developer_mode":true,"app_path":"/plugins/com.mattermost.apps/apps/com.cedricziel.mm-bot-dev","bot_user_id":"123","bot_access_token":"abc","oauth2":{}}}'
            ],
            [
                'app with bindings',
                MattermostApp::create('test', 'Test', 'https://example.com')
                    ->withHttp(HttpDeploymentDescriptor::create('https://example.com'))
                    ->withBindings(new Call('test')),
                '{"path":"/bindings","context":{"app_id":"","mattermost_site_url":"https://mattermost.com","developer_mode":true,"app_path":"/plugins/com.mattermost.apps/apps/com.cedricziel.mm-bot-dev","bot_user_id":"123","bot_access_token":"abc","oauth2":{}}}'
            ]
        ];
    }

    #[Test]
    public function canCreateApp()
    {
        $app = MattermostApp::create('test', 'Test', 'https://example.com');

        $this->assertInstanceOf(MattermostApp::class, $app);
    }

    #[Test]
    #[DataProvider('provideApps')]
    public function canGetManifest(string $description, MattermostApp $app)
    {
        $this->assertNotNull($app->getManifest());

        $json = json_encode($app->getManifest());
        self::assertJson($json);

        $response = $app->handle($this->psrFactory->createServerRequest('GET', 'https://example.com/manifest.json'));
        $bodyJson = $response->getBody()->getContents();
        self::assertEquals(200, $response->getStatusCode());
        self::assertJson($bodyJson);

        $responseObject = json_decode($bodyJson);
        self::assertEquals('test', $responseObject->app_id);
        self::assertEquals('Test', $responseObject->display_name);
        self::assertEquals('https://example.com', $responseObject->homepage_url);
        self::assertEquals('https://example.com', $responseObject->http->root_url);
    }

    #[Test]
    public function canAddBinding()
    {
        $app = MattermostApp::create('test', 'Test', 'https://example.com')
            ->withHttp(HttpDeploymentDescriptor::create('https://example.com'))
            ->addBinding(
                Location::command,
                LocationBinding::create('test'),
            )
            ->requestPermission(AppPermission::act_as_bot)
            ->withOnInstall(new Call('test'));

        $request = $this->psrFactory->createServerRequest('GET', 'https://example.com/bindings');
        $request = $request->withParsedBody(new Request('/bindings', new Context(
                mattermost_site_url: 'https://mattermost.com',
                bot_user_id: 'abc',
                bot_access_token: '123'),
            ),
        );

        $response = $app->handle($request);

        self::assertEquals(200, $response->getStatusCode());
        self::assertJson($response->getBody()->getContents());
    }

    #[Test]
    public function canPrefixBindings()
    {
        $app = MattermostApp::create('test', 'Test', 'https://example.com')
            ->withBindingsPrefix('dev')
            ->withHttp(HttpDeploymentDescriptor::create('https://example.com'))
            ->addBinding(
                Location::command,
                LocationBinding::create('test'),
            )
            ->requestPermission(AppPermission::act_as_bot)
            ->withOnInstall(new Call('test'));

        $request = $this->psrFactory->createServerRequest('GET', 'https://example.com/bindings');
        $request = $request->withParsedBody(new Request('/bindings', new Context(
            mattermost_site_url: 'https://mattermost.com',
            bot_user_id: 'abc',
            bot_access_token: '123'),
        ),
        );

        $response = $app->handle($request);

        $bindings = json_decode($response->getBody()->getContents());

        self::assertEquals('dev-test', $bindings->data[0]->bindings[0]->location);
    }
}
