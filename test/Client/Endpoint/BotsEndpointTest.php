<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\BotsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Bot;
use CedricZiel\MattermostPhp\Client\Model\CreateBotRequest;
use CedricZiel\MattermostPhp\Client\Model\PatchBotRequest;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(BotsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Bot::class)]
class BotsEndpointTest extends ClientTestCase
{
    public BotsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new BotsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function convertUserToBotBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';

        $result = $this->endpoint->convertUserToBot($user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/users/test-user_id/convert_to_bot');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function createBotBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['user_id' => 'test-user_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'display_name' => 'test-display_name', 'description' => 'test-description', 'owner_id' => 'test-owner_id']);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateBotRequest(username: 'test-username');

        $result = $this->endpoint->createBot($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/bots');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Bot::class, $result);
    }

    #[Test]
    public function getBotsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['user_id' => 'test-user_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'display_name' => 'test-display_name', 'description' => 'test-description', 'owner_id' => 'test-owner_id']]);

        $page = 1;
        $per_page = 1;
        $include_deleted = true;
        $only_orphaned = true;

        $result = $this->endpoint->getBots($page, $per_page, $include_deleted, $only_orphaned);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/bots');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'include_deleted' => '1', 'only_orphaned' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Bot::class, $result[0]);
    }

    #[Test]
    public function patchBotBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'display_name' => 'test-display_name', 'description' => 'test-description', 'owner_id' => 'test-owner_id']);

        $bot_user_id = 'test-bot_user_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\PatchBotRequest(username: 'test-username');

        $result = $this->endpoint->patchBot($bot_user_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('PUT');
        $this->assertRequestPath('/api/v4/bots/test-bot_user_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Bot::class, $result);
    }

    #[Test]
    public function getBotBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'display_name' => 'test-display_name', 'description' => 'test-description', 'owner_id' => 'test-owner_id']);

        $bot_user_id = 'test-bot_user_id';
        $include_deleted = true;

        $result = $this->endpoint->getBot($bot_user_id, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/bots/test-bot_user_id');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['include_deleted' => '1']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Bot::class, $result);
    }

    #[Test]
    public function disableBotBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'display_name' => 'test-display_name', 'description' => 'test-description', 'owner_id' => 'test-owner_id']);

        $bot_user_id = 'test-bot_user_id';

        $result = $this->endpoint->disableBot($bot_user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/bots/test-bot_user_id/disable');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Bot::class, $result);
    }

    #[Test]
    public function enableBotBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'display_name' => 'test-display_name', 'description' => 'test-description', 'owner_id' => 'test-owner_id']);

        $bot_user_id = 'test-bot_user_id';

        $result = $this->endpoint->enableBot($bot_user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/bots/test-bot_user_id/enable');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Bot::class, $result);
    }

    #[Test]
    public function assignBotBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'display_name' => 'test-display_name', 'description' => 'test-description', 'owner_id' => 'test-owner_id']);

        $bot_user_id = 'test-bot_user_id';
        $user_id = 'test-user_id';

        $result = $this->endpoint->assignBot($bot_user_id, $user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/bots/test-bot_user_id/assign/test-user_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Bot::class, $result);
    }

    #[Test]
    public function deleteBotIconImageBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $bot_user_id = 'test-bot_user_id';

        $result = $this->endpoint->deleteBotIconImage($bot_user_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/bots/test-bot_user_id/icon');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }
}
