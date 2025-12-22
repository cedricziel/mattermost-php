<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Response;

use CedricZiel\MattermostPhp\Client\Response\TextResponse;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\WithoutErrorHandler;
use PHPUnit\Framework\TestCase;

#[CoversClass(TextResponse::class)]
class TextResponseTest extends TestCase
{
    #[Test]
    public function getStatusCodeReturnsConstructorValue(): void
    {
        $response = new TextResponse(200, 'text/plain', 'content');

        $this->assertSame(200, $response->getStatusCode());
    }

    #[Test]
    public function getContentTypeReturnsConstructorValue(): void
    {
        $response = new TextResponse(200, 'text/html', 'content');

        $this->assertSame('text/html', $response->getContentType());
    }

    #[Test]
    public function getBodyReturnsStringContent(): void
    {
        $content = 'Hello, World!';
        $response = new TextResponse(200, 'text/plain', $content);

        $this->assertSame($content, $response->getBody());
    }

    #[Test]
    public function getHeadersReturnsAllHeaders(): void
    {
        $headers = [
            'Content-Length' => ['100'],
            'Cache-Control' => ['no-cache'],
        ];
        $response = new TextResponse(200, 'text/plain', 'content', $headers);

        $this->assertSame($headers, $response->getHeaders());
    }

    #[Test]
    public function getHeaderReturnsCaseInsensitiveValue(): void
    {
        $headers = [
            'Content-Type' => ['text/plain; charset=utf-8'],
        ];
        $response = new TextResponse(200, 'text/plain', 'content', $headers);

        $this->assertSame('text/plain; charset=utf-8', $response->getHeader('Content-Type'));
        $this->assertSame('text/plain; charset=utf-8', $response->getHeader('content-type'));
        $this->assertSame('text/plain; charset=utf-8', $response->getHeader('CONTENT-TYPE'));
    }

    #[Test]
    public function getHeaderReturnsNullForMissingHeader(): void
    {
        $response = new TextResponse(200, 'text/plain', 'content', []);

        $this->assertNull($response->getHeader('Non-Existent'));
    }

    #[Test]
    public function getLinesReturnsArrayOfLines(): void
    {
        $content = "Line 1\nLine 2\nLine 3";
        $response = new TextResponse(200, 'text/plain', $content);

        $lines = $response->getLines();

        $this->assertSame(['Line 1', 'Line 2', 'Line 3'], $lines);
    }

    #[Test]
    public function getLinesHandlesEmptyBody(): void
    {
        $response = new TextResponse(200, 'text/plain', '');

        $lines = $response->getLines();

        $this->assertSame([''], $lines);
    }

    #[Test]
    public function getLinesHandlesSingleLine(): void
    {
        $response = new TextResponse(200, 'text/plain', 'Single line without newline');

        $lines = $response->getLines();

        $this->assertSame(['Single line without newline'], $lines);
    }

    #[Test]
    public function getLinesHandlesTrailingNewline(): void
    {
        $content = "Line 1\nLine 2\n";
        $response = new TextResponse(200, 'text/plain', $content);

        $lines = $response->getLines();

        $this->assertSame(['Line 1', 'Line 2', ''], $lines);
    }

    #[Test]
    public function saveToFileWritesContent(): void
    {
        $content = 'File content to save';
        $response = new TextResponse(200, 'text/plain', $content);

        $tempFile = sys_get_temp_dir() . '/mattermost_test_text_' . uniqid() . '.txt';

        try {
            $response->saveToFile($tempFile);

            $this->assertFileExists($tempFile);
            $this->assertSame($content, file_get_contents($tempFile));
        } finally {
            if (file_exists($tempFile)) {
                unlink($tempFile);
            }
        }
    }

    #[Test]
    #[WithoutErrorHandler]
    public function saveToFileThrowsExceptionForInvalidPath(): void
    {
        $response = new TextResponse(200, 'text/plain', 'content');

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Cannot write to file');

        $response->saveToFile('/nonexistent/directory/file.txt');
    }

    #[Test]
    public function handlesMultibyteContent(): void
    {
        $content = "Hello, \xE4\xB8\x96\xE7\x95\x8C"; // Hello, 世界
        $response = new TextResponse(200, 'text/plain', $content);

        $this->assertSame($content, $response->getBody());
    }

    #[Test]
    public function handlesWindowsLineEndings(): void
    {
        // Note: getLines() only splits on \n, not \r\n
        $content = "Line 1\r\nLine 2";
        $response = new TextResponse(200, 'text/plain', $content);

        $lines = $response->getLines();

        // \r will remain at end of first line
        $this->assertSame(["Line 1\r", "Line 2"], $lines);
    }
}
