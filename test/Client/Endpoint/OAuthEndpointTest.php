<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\OAuthEndpoint;
use CedricZiel\MattermostPhp\Client\Model\AuthorizationServerMetadata;
use CedricZiel\MattermostPhp\Client\Model\CreateOAuthAppRequest;
use CedricZiel\MattermostPhp\Client\Model\OAuthApp;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\UpdateOAuthAppRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(OAuthEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(OAuthApp::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(AuthorizationServerMetadata::class)]
class OAuthEndpointTest extends ClientTestCase
{
    public OAuthEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new OAuthEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function createOAuthAppBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'client_secret' => 'test-client_secret', 'name' => 'test-name', 'description' => 'test-description', 'icon_url' => 'test-icon_url', 'callback_urls' => [], 'homepage' => 'test-homepage', 'is_trusted' => true, 'create_at' => 1234567890, 'update_at' => 1234567890]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateOAuthAppRequest(name: 'test-name', description: 'test-description', callback_urls: [], homepage: 'test-homepage');

        $result = $this->endpoint->createOAuthApp($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/oauth/apps');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OAuthApp::class, $result);
    }

    #[Test]
    public function getOAuthAppsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'client_secret' => 'test-client_secret', 'name' => 'test-name', 'description' => 'test-description', 'icon_url' => 'test-icon_url', 'callback_urls' => [], 'homepage' => 'test-homepage', 'is_trusted' => true, 'create_at' => 1234567890, 'update_at' => 1234567890]]);

        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getOAuthApps($page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/oauth/apps');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OAuthApp::class, $result[0]);
    }

    #[Test]
    public function getOAuthAppBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'client_secret' => 'test-client_secret', 'name' => 'test-name', 'description' => 'test-description', 'icon_url' => 'test-icon_url', 'callback_urls' => [], 'homepage' => 'test-homepage', 'is_trusted' => true, 'create_at' => 1234567890, 'update_at' => 1234567890]);

        $app_id = 'test-app_id';

        $result = $this->endpoint->getOAuthApp($app_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/oauth/apps/test-app_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OAuthApp::class, $result);
    }

    #[Test]
    public function updateOAuthAppBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'client_secret' => 'test-client_secret', 'name' => 'test-name', 'description' => 'test-description', 'icon_url' => 'test-icon_url', 'callback_urls' => [], 'homepage' => 'test-homepage', 'is_trusted' => true, 'create_at' => 1234567890, 'update_at' => 1234567890]);

        $app_id = 'test-app_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\UpdateOAuthAppRequest(id: 'test-id', name: 'test-name', description: 'test-description', callback_urls: [], homepage: 'test-homepage');

        $result = $this->endpoint->updateOAuthApp($app_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/oauth/apps/test-app_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OAuthApp::class, $result);
    }

    #[Test]
    public function deleteOAuthAppBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $app_id = 'test-app_id';

        $result = $this->endpoint->deleteOAuthApp($app_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/oauth/apps/test-app_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function regenerateOAuthAppSecretBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'client_secret' => 'test-client_secret', 'name' => 'test-name', 'description' => 'test-description', 'icon_url' => 'test-icon_url', 'callback_urls' => [], 'homepage' => 'test-homepage', 'is_trusted' => true, 'create_at' => 1234567890, 'update_at' => 1234567890]);

        $app_id = 'test-app_id';

        $result = $this->endpoint->regenerateOAuthAppSecret($app_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/oauth/apps/test-app_id/regen_secret');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OAuthApp::class, $result);
    }

    #[Test]
    public function getOAuthAppInfoBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'client_secret' => 'test-client_secret', 'name' => 'test-name', 'description' => 'test-description', 'icon_url' => 'test-icon_url', 'callback_urls' => [], 'homepage' => 'test-homepage', 'is_trusted' => true, 'create_at' => 1234567890, 'update_at' => 1234567890]);

        $app_id = 'test-app_id';

        $result = $this->endpoint->getOAuthAppInfo($app_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/oauth/apps/test-app_id/info');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OAuthApp::class, $result);
    }

    #[Test]
    public function getAuthorizationServerMetadataBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['issuer' => 'test-issuer', 'authorization_endpoint' => 'test-authorization_endpoint', 'token_endpoint' => 'test-token_endpoint', 'response_types_supported' => [], 'registration_endpoint' => 'test-registration_endpoint', 'scopes_supported' => [], 'grant_types_supported' => [], 'token_endpoint_auth_methods_supported' => [], 'code_challenge_methods_supported' => []]);

        $result = $this->endpoint->getAuthorizationServerMetadata();

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/.well-known/oauth-authorization-server');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\AuthorizationServerMetadata::class, $result);
    }

    #[Test]
    public function getAuthorizedOAuthAppsForUserBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'client_secret' => 'test-client_secret', 'name' => 'test-name', 'description' => 'test-description', 'icon_url' => 'test-icon_url', 'callback_urls' => [], 'homepage' => 'test-homepage', 'is_trusted' => true, 'create_at' => 1234567890, 'update_at' => 1234567890]]);

        $user_id = 'test-user_id';
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->getAuthorizedOAuthAppsForUser($user_id, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/users/test-user_id/oauth/apps/authorized');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\OAuthApp::class, $result[0]);
    }
}
