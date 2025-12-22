<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\ReactionsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\GetBulkReactionsRequest;
use CedricZiel\MattermostPhp\Client\Model\Reaction;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(ReactionsEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(Reaction::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(StatusOK::class)]
class ReactionsEndpointTest extends ClientTestCase
{
    public ReactionsEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new ReactionsEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function getReactionsBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, [['user_id' => 'test-user_id', 'post_id' => 'test-post_id', 'emoji_name' => 'test-emoji_name', 'create_at' => 1234567890]]);

        $post_id = 'test-post_id';

        $result = $this->endpoint->getReactions($post_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/posts/test-post_id/reactions');
        $this->assertRequestHasAuthHeader();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\Reaction::class, $result[0]);
    }

    #[Test]
    public function deleteReactionBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['status' => 'test-status']);

        $user_id = 'test-user_id';
        $post_id = 'test-post_id';
        $emoji_name = 'test-emoji_name';

        $result = $this->endpoint->deleteReaction($user_id, $post_id, $emoji_name);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/users/test-user_id/posts/test-post_id/reactions/test-emoji_name');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\StatusOK::class, $result);
    }
}
