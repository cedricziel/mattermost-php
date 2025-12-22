<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\BookmarksEndpoint;
use CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo;
use CedricZiel\MattermostPhp\Client\Model\CreateChannelBookmarkRequest;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(BookmarksEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(ChannelBookmarkWithFileInfo::class)]
class BookmarksEndpointTest extends ClientTestCase
{
    public BookmarksEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new BookmarksEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function listChannelBookmarksForChannelBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, [['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'channel_id' => 'test-channel_id', 'owner_id' => 'test-owner_id', 'file_id' => 'test-file_id', 'display_name' => 'test-display_name', 'sort_order' => 1234567890, 'link_url' => 'test-link_url', 'image_url' => 'test-image_url', 'emoji' => 'test-emoji', 'type' => 'test-type', 'original_id' => 'test-original_id', 'parent_id' => 'test-parent_id']]);

        $channel_id = 'test-channel_id';
        $bookmarks_since = 1;

        $result = $this->endpoint->listChannelBookmarksForChannel($channel_id, $bookmarks_since);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/bookmarks');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestQueryParams(['bookmarks_since' => '1']);
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo::class, $result[0]);
    }

    #[Test]
    public function createChannelBookmarkBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'channel_id' => 'test-channel_id', 'owner_id' => 'test-owner_id', 'file_id' => 'test-file_id', 'display_name' => 'test-display_name', 'sort_order' => 1234567890, 'link_url' => 'test-link_url', 'image_url' => 'test-image_url', 'emoji' => 'test-emoji', 'type' => 'test-type', 'original_id' => 'test-original_id', 'parent_id' => 'test-parent_id']);

        $channel_id = 'test-channel_id';
        $requestBody = new \CedricZiel\MattermostPhp\Client\Model\CreateChannelBookmarkRequest(display_name: 'test-display_name', type: 'test-type');

        $result = $this->endpoint->createChannelBookmark($channel_id, $requestBody);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/bookmarks');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo::class, $result);
    }

    #[Test]
    public function deleteChannelBookmarkBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'channel_id' => 'test-channel_id', 'owner_id' => 'test-owner_id', 'file_id' => 'test-file_id', 'display_name' => 'test-display_name', 'sort_order' => 1234567890, 'link_url' => 'test-link_url', 'image_url' => 'test-image_url', 'emoji' => 'test-emoji', 'type' => 'test-type', 'original_id' => 'test-original_id', 'parent_id' => 'test-parent_id']);

        $channel_id = 'test-channel_id';
        $bookmark_id = 'test-bookmark_id';

        $result = $this->endpoint->deleteChannelBookmark($channel_id, $bookmark_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('DELETE');
        $this->assertRequestPath('/api/v4/channels/test-channel_id/bookmarks/test-bookmark_id');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\ChannelBookmarkWithFileInfo::class, $result);
    }
}
