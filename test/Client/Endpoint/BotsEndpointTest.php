<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\BotsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Bot;
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
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }

    #[Test]
    public function getBotsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['status' => 'ok']]);

        $page = 1;
        $per_page = 1;
        $include_deleted = true;
        $only_orphaned = true;

        $result = $this->endpoint->getBots($page, $per_page, $include_deleted, $only_orphaned);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
    }

    #[Test]
    public function getBotBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'display_name' => 'test-display_name', 'description' => 'test-description', 'owner_id' => 'test-owner_id']);

        $bot_user_id = 'test-bot_user_id';
        $include_deleted = true;

        $result = $this->endpoint->getBot($bot_user_id, $include_deleted);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Bot::class, $result);
    }

    #[Test]
    public function disableBotBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['user_id' => 'test-user_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'display_name' => 'test-display_name', 'description' => 'test-description', 'owner_id' => 'test-owner_id']);

        $bot_user_id = 'test-bot_user_id';

        $result = $this->endpoint->disableBot($bot_user_id);

        $this->assertNotNull($this->getLastRequest());
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
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }
}
