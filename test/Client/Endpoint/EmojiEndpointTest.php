<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\EmojiEndpoint;
use CedricZiel\MattermostPhp\Client\Model\Emoji;
use CedricZiel\MattermostPhp\Client\Model\GetEmojisByNamesRequest;
use CedricZiel\MattermostPhp\Client\Model\SearchEmojiRequest;
use CedricZiel\MattermostPhp\Client\Model\User;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(EmojiEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Emoji::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(User::class)]
class EmojiEndpointTest extends ClientTestCase
{
    public EmojiEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new EmojiEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function createEmojiBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'creator_id' => 'test-creator_id', 'name' => 'test-name', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]);

        $image = 'test-file-content';
        $emoji = 'test-emoji';

        $result = $this->endpoint->createEmoji($image, $emoji);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/emoji');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestContentTypeMultipart();
        $this->assertRequestBodyHasMultipartFile('image');
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Emoji::class, $result);
    }

    #[Test]
    public function getEmojiListBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'creator_id' => 'test-creator_id', 'name' => 'test-name', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]);

        $page = 1;
        $per_page = 1;
        $sort = 'test-sort';

        $result = $this->endpoint->getEmojiList($page, $per_page, $sort);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/emoji');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['page' => '1', 'per_page' => '1', 'sort' => 'test-sort']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Emoji::class, $result);
    }

    #[Test]
    public function getEmojiBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'creator_id' => 'test-creator_id', 'name' => 'test-name', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]);

        $emoji_id = 'test-emoji_id';

        $result = $this->endpoint->getEmoji($emoji_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/emoji/test-emoji_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Emoji::class, $result);
    }

    #[Test]
    public function deleteEmojiBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'creator_id' => 'test-creator_id', 'name' => 'test-name', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]);

        $emoji_id = 'test-emoji_id';

        $result = $this->endpoint->deleteEmoji($emoji_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/emoji/test-emoji_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Emoji::class, $result);
    }

    #[Test]
    public function getEmojiByNameBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'creator_id' => 'test-creator_id', 'name' => 'test-name', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]);

        $emoji_name = 'test-emoji_name';

        $result = $this->endpoint->getEmojiByName($emoji_name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/emoji/name/test-emoji_name');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Emoji::class, $result);
    }

    #[Test]
    public function searchEmojiBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'creator_id' => 'test-creator_id', 'name' => 'test-name', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\SearchEmojiRequest(term: 'test-term');

        $result = $this->endpoint->searchEmoji($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/emoji/search');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Emoji::class, $result[0]);
    }

    #[Test]
    public function autocompleteEmojiBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'creator_id' => 'test-creator_id', 'name' => 'test-name', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890]);

        $name = 'test-name';

        $result = $this->endpoint->autocompleteEmoji($name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/emoji/autocomplete');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['name' => 'test-name']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Emoji::class, $result);
    }

    #[Test]
    public function getEmojisByNamesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'username' => 'test-username', 'first_name' => 'test-first_name', 'last_name' => 'test-last_name', 'nickname' => 'test-nickname', 'email' => 'test-email', 'email_verified' => true, 'auth_service' => 'test-auth_service', 'roles' => 'test-roles', 'locale' => 'test-locale', 'last_password_update' => 1234567890, 'last_picture_update' => 1234567890, 'failed_attempts' => 1234567890, 'mfa_active' => true, 'timezone' => 1234567890, 'terms_of_service_id' => 'test-terms_of_service_id', 'terms_of_service_create_at' => 1234567890]]);

        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\GetEmojisByNamesRequest(items: []);

        $result = $this->endpoint->getEmojisByNames($requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/emoji/names');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\User::class, $result[0]);
    }
}
