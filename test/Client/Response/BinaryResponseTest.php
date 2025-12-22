<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Response;

use CedricZiel\MattermostPhp\Client\Response\BinaryResponse;
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\WithoutErrorHandler;
use PHPUnit\Framework\TestCase;

#[CoversClass(BinaryResponse::class)]
class BinaryResponseTest extends TestCase
{
    #[Test]
    public function getStatusCodeReturnsConstructorValue(): void
    {
        $response = new BinaryResponse(200, 'image/png', Utils::streamFor(''));

        $this->assertSame(200, $response->getStatusCode());
    }

    #[Test]
    public function getContentTypeReturnsConstructorValue(): void
    {
        $response = new BinaryResponse(200, 'image/jpeg', Utils::streamFor(''));

        $this->assertSame('image/jpeg', $response->getContentType());
    }

    #[Test]
    public function getBodyReturnsStreamInterface(): void
    {
        $stream = Utils::streamFor('test content');
        $response = new BinaryResponse(200, 'application/octet-stream', $stream);

        $this->assertSame($stream, $response->getBody());
    }

    #[Test]
    public function getContentsReadsStreamAndRewinds(): void
    {
        $content = 'binary content here';
        $stream = Utils::streamFor($content);
        $response = new BinaryResponse(200, 'application/octet-stream', $stream);

        // Read contents multiple times to verify rewind
        $this->assertSame($content, $response->getContents());
        $this->assertSame($content, $response->getContents());
    }

    #[Test]
    public function getHeadersReturnsAllHeaders(): void
    {
        $headers = [
            'Content-Length' => ['12345'],
            'Content-Disposition' => ['attachment; filename="test.bin"'],
        ];
        $response = new BinaryResponse(200, 'application/octet-stream', Utils::streamFor(''), $headers);

        $this->assertSame($headers, $response->getHeaders());
    }

    #[Test]
    public function getHeaderReturnsCaseInsensitiveValue(): void
    {
        $headers = [
            'Content-Disposition' => ['attachment; filename="test.bin"'],
        ];
        $response = new BinaryResponse(200, 'application/octet-stream', Utils::streamFor(''), $headers);

        // Test case-insensitive lookup
        $this->assertSame('attachment; filename="test.bin"', $response->getHeader('Content-Disposition'));
        $this->assertSame('attachment; filename="test.bin"', $response->getHeader('content-disposition'));
        $this->assertSame('attachment; filename="test.bin"', $response->getHeader('CONTENT-DISPOSITION'));
    }

    #[Test]
    public function getHeaderReturnsNullForMissingHeader(): void
    {
        $response = new BinaryResponse(200, 'application/octet-stream', Utils::streamFor(''), []);

        $this->assertNull($response->getHeader('Non-Existent'));
    }

    #[Test]
    public function saveToFileWritesContent(): void
    {
        $content = 'file content to save';
        $response = new BinaryResponse(200, 'application/octet-stream', Utils::streamFor($content));

        $tempFile = sys_get_temp_dir() . '/mattermost_test_' . uniqid() . '.bin';

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
    public function saveToFileHandlesLargeContent(): void
    {
        // Create content larger than the 8192 byte chunk size
        $content = str_repeat('x', 20000);
        $response = new BinaryResponse(200, 'application/octet-stream', Utils::streamFor($content));

        $tempFile = sys_get_temp_dir() . '/mattermost_test_large_' . uniqid() . '.bin';

        try {
            $response->saveToFile($tempFile);

            $this->assertFileExists($tempFile);
            $this->assertSame(20000, strlen(file_get_contents($tempFile)));
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
        $response = new BinaryResponse(200, 'application/octet-stream', Utils::streamFor('content'));

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Cannot open file for writing');

        $response->saveToFile('/nonexistent/directory/file.bin');
    }

    #[Test]
    #[DataProvider('imageContentTypeProvider')]
    public function isImageDetectsImageTypes(string $contentType, bool $expected): void
    {
        $response = new BinaryResponse(200, $contentType, Utils::streamFor(''));

        $this->assertSame($expected, $response->isImage());
    }

    public static function imageContentTypeProvider(): array
    {
        return [
            'image/png' => ['image/png', true],
            'image/jpeg' => ['image/jpeg', true],
            'image/gif' => ['image/gif', true],
            'image/webp' => ['image/webp', true],
            'image/svg+xml' => ['image/svg+xml', true],
            'application/pdf' => ['application/pdf', false],
            'application/octet-stream' => ['application/octet-stream', false],
            'text/plain' => ['text/plain', false],
        ];
    }

    #[Test]
    #[DataProvider('extensionProvider')]
    public function getExtensionReturnsCorrectExtension(string $contentType, ?string $expected): void
    {
        $response = new BinaryResponse(200, $contentType, Utils::streamFor(''));

        $this->assertSame($expected, $response->getExtension());
    }

    public static function extensionProvider(): array
    {
        return [
            'image/jpeg' => ['image/jpeg', 'jpg'],
            'image/png' => ['image/png', 'png'],
            'image/gif' => ['image/gif', 'gif'],
            'image/webp' => ['image/webp', 'webp'],
            'image/svg+xml' => ['image/svg+xml', 'svg'],
            'application/pdf' => ['application/pdf', 'pdf'],
            'application/zip' => ['application/zip', 'zip'],
            'application/octet-stream' => ['application/octet-stream', 'bin'],
            'text/plain' => ['text/plain', 'txt'],
            'unknown type' => ['application/x-custom', null],
        ];
    }

    #[Test]
    public function getFilenameExtractsFromContentDisposition(): void
    {
        $headers = [
            'Content-Disposition' => ['attachment; filename="report.pdf"'],
        ];
        $response = new BinaryResponse(200, 'application/pdf', Utils::streamFor(''), $headers);

        $this->assertSame('report.pdf', $response->getFilename());
    }

    #[Test]
    public function getFilenameHandlesUnquotedFilename(): void
    {
        $headers = [
            'Content-Disposition' => ['attachment; filename=report.pdf'],
        ];
        $response = new BinaryResponse(200, 'application/pdf', Utils::streamFor(''), $headers);

        $this->assertSame('report.pdf', $response->getFilename());
    }

    #[Test]
    public function getFilenameHandlesSingleQuotes(): void
    {
        $headers = [
            'Content-Disposition' => ["attachment; filename='report.pdf'"],
        ];
        $response = new BinaryResponse(200, 'application/pdf', Utils::streamFor(''), $headers);

        $this->assertSame('report.pdf', $response->getFilename());
    }

    #[Test]
    public function getFilenameReturnsNullWhenNoHeader(): void
    {
        $response = new BinaryResponse(200, 'application/pdf', Utils::streamFor(''), []);

        $this->assertNull($response->getFilename());
    }

    #[Test]
    public function getFilenameReturnsNullWhenNoFilenameInHeader(): void
    {
        $headers = [
            'Content-Disposition' => ['inline'],
        ];
        $response = new BinaryResponse(200, 'application/pdf', Utils::streamFor(''), $headers);

        $this->assertNull($response->getFilename());
    }
}
