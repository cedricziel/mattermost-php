<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Endpoint;

use CedricZiel\MattermostPhp\Client\Endpoint\FilesEndpoint;
use CedricZiel\MattermostPhp\Client\Model\FileInfo;
use CedricZiel\MattermostPhp\Client\Model\FileInfoList;
use CedricZiel\MattermostPhp\Client\Model\GetFileLinkResponse;
use CedricZiel\MattermostPhp\Client\Model\UploadFileResponse;
use CedricZiel\MattermostPhp\Test\Client\ClientTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(FilesEndpoint::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(UploadFileResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(GetFileLinkResponse::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(FileInfo::class)]
#[\PHPUnit\Framework\Attributes\UsesClass(FileInfoList::class)]
class FilesEndpointTest extends ClientTestCase
{
    public FilesEndpoint $endpoint;

    protected function setUp(): void
    {
        parent::setUp();
        $this->endpoint = new FilesEndpoint(
            $this->baseUrl,
            $this->token,
            $this->mockClient,
            new \GuzzleHttp\Psr7\HttpFactory(),
            $this->streamFactory,
        );
    }

    #[Test]
    public function uploadFileBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(201, ['file_infos' => [], 'client_ids' => []]);

        $files = 'test-file-content';
        $channel_id = 'test-channel_id';
        $client_ids = 'test-client_ids';
        $filename = 'test-filename';

        $result = $this->endpoint->uploadFile($filename, $files, $channel_id, $client_ids);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/files');
        $this->assertRequestHasAuthHeader();
        $this->assertRequestContentTypeMultipart();
        $this->assertRequestBodyHasMultipartFile('files');
        $this->assertRequestQueryParams(['channel_id' => 'test-channel_id', 'filename' => 'test-filename']);
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\UploadFileResponse::class, $result);
    }

    #[Test]
    public function getFileLinkBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['link' => 'test-link']);

        $file_id = 'test-file_id';

        $result = $this->endpoint->getFileLink($file_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/files/test-file_id/link');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\GetFileLinkResponse::class, $result);
    }

    #[Test]
    public function getFileInfoBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['id' => 'test-id', 'user_id' => 'test-user_id', 'post_id' => 'test-post_id', 'create_at' => 1234567890, 'update_at' => 1234567890, 'delete_at' => 1234567890, 'name' => 'test-name', 'extension' => 'test-extension', 'size' => 1234567890, 'mime_type' => 'test-mime_type', 'width' => 1234567890, 'height' => 1234567890, 'has_preview_image' => true]);

        $file_id = 'test-file_id';

        $result = $this->endpoint->getFileInfo($file_id);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('GET');
        $this->assertRequestPath('/api/v4/files/test-file_id/info');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\FileInfo::class, $result);
    }

    #[Test]
    public function searchFilesBuildsCorrectRequest(): void
    {
        $this->mockJsonResponse(200, ['order' => [], 'next_file_id' => 'test-next_file_id', 'prev_file_id' => 'test-prev_file_id']);

        $terms = 'test-terms';
        $is_or_search = true;
        $time_zone_offset = 1;
        $include_deleted_channels = true;
        $page = 1;
        $per_page = 1;

        $result = $this->endpoint->searchFiles($terms, $is_or_search, $time_zone_offset, $include_deleted_channels, $page, $per_page);

        $this->assertNotNull($this->getLastRequest());
        $this->assertRequestMethod('POST');
        $this->assertRequestPath('/api/v4/files/search');
        $this->assertRequestHasAuthHeader();
        $this->assertInstanceOf(\CedricZiel\MattermostPhp\Client\Model\FileInfoList::class, $result);
    }
}
