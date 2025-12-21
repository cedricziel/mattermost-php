<?php

namespace CedricZiel\MattermostPhp\Test\Client;

use CedricZiel\MattermostPhp\Client\MultipartTrait;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(MultipartTrait::class)]
class MultipartTraitTest extends TestCase
{
    use MultipartTrait;

    public function testCreateMultipartStreamWithStringContent(): void
    {
        $fields = [
            'channel_id' => 'test-channel-123',
            'files' => [
                'contents' => 'file content here',
                'filename' => 'test.txt',
            ],
        ];

        $result = $this->createMultipartStream($fields);

        $this->assertArrayHasKey('stream', $result);
        $this->assertArrayHasKey('boundary', $result);
        $this->assertNotEmpty($result['boundary']);

        $body = (string) $result['stream'];
        $this->assertStringContainsString('channel_id', $body);
        $this->assertStringContainsString('test-channel-123', $body);
        $this->assertStringContainsString('file content here', $body);
        $this->assertStringContainsString('test.txt', $body);
    }

    public function testCreateMultipartStreamSkipsNullValues(): void
    {
        $fields = [
            'channel_id' => 'test-channel',
            'client_ids' => null,
            'files' => ['contents' => 'content'],
        ];

        $result = $this->createMultipartStream($fields);
        $body = (string) $result['stream'];

        $this->assertStringContainsString('channel_id', $body);
        $this->assertStringNotContainsString('client_ids', $body);
    }

    public function testCreateMultipartStreamWithSimpleValues(): void
    {
        $fields = [
            'field1' => 'value1',
            'field2' => 'value2',
        ];

        $result = $this->createMultipartStream($fields);
        $body = (string) $result['stream'];

        $this->assertStringContainsString('field1', $body);
        $this->assertStringContainsString('value1', $body);
        $this->assertStringContainsString('field2', $body);
        $this->assertStringContainsString('value2', $body);
    }

    public function testBoundaryIsUnique(): void
    {
        $fields = ['test' => 'value'];

        $result1 = $this->createMultipartStream($fields);
        $result2 = $this->createMultipartStream($fields);

        $this->assertNotEquals($result1['boundary'], $result2['boundary']);
    }
}
