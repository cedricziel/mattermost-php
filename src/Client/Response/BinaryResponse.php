<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Client\Response;

use Psr\Http\Message\StreamInterface;

class BinaryResponse implements ResponseInterface
{
    /**
     * @param array<string, string[]> $headers
     */
    public function __construct(
        private readonly int $statusCode,
        private readonly string $contentType,
        private readonly StreamInterface $body,
        private readonly array $headers = [],
    ) {
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    /**
     * Get the entire body contents as a string.
     * Note: This reads the entire stream into memory.
     */
    public function getContents(): string
    {
        $this->body->rewind();

        return $this->body->getContents();
    }

    /**
     * @return array<string, string[]>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getHeader(string $name): ?string
    {
        $normalizedName = strtolower($name);
        foreach ($this->headers as $headerName => $values) {
            if (strtolower($headerName) === $normalizedName) {
                return $values[0] ?? null;
            }
        }

        return null;
    }

    /**
     * Save the response body to a file.
     *
     * @throws \RuntimeException If the file cannot be written
     */
    public function saveToFile(string $path): void
    {
        $handle = fopen($path, 'wb');
        if ($handle === false) {
            throw new \RuntimeException(sprintf('Cannot open file for writing: %s', $path));
        }

        try {
            $this->body->rewind();
            while (!$this->body->eof()) {
                $chunk = $this->body->read(8192);
                if (fwrite($handle, $chunk) === false) {
                    throw new \RuntimeException(sprintf('Failed to write to file: %s', $path));
                }
            }
        } finally {
            fclose($handle);
        }
    }

    /**
     * Check if the response is an image based on content type.
     */
    public function isImage(): bool
    {
        return str_starts_with($this->contentType, 'image/');
    }

    /**
     * Get the file extension based on content type.
     */
    public function getExtension(): ?string
    {
        $extensions = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
            'image/svg+xml' => 'svg',
            'application/pdf' => 'pdf',
            'application/zip' => 'zip',
            'application/octet-stream' => 'bin',
            'text/plain' => 'txt',
        ];

        return $extensions[$this->contentType] ?? null;
    }

    /**
     * Get the Content-Disposition filename if present.
     */
    public function getFilename(): ?string
    {
        $disposition = $this->getHeader('Content-Disposition');
        if ($disposition === null) {
            return null;
        }

        if (preg_match('/filename[^;=\n]*=([\'\"]?)([^\'\"\n;]+)\1/', $disposition, $matches)) {
            return $matches[2];
        }

        return null;
    }
}
