<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Client\Response;

class TextResponse implements ResponseInterface
{
    /**
     * @param array<string, string[]> $headers
     */
    public function __construct(
        private readonly int $statusCode,
        private readonly string $contentType,
        private readonly string $body,
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

    public function getBody(): string
    {
        return $this->body;
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
     * Get the response body as an array of lines.
     *
     * @return string[]
     */
    public function getLines(): array
    {
        return explode("\n", $this->body);
    }

    /**
     * Save the response body to a file.
     *
     * @throws \RuntimeException If the file cannot be written
     */
    public function saveToFile(string $path): void
    {
        if (file_put_contents($path, $this->body) === false) {
            throw new \RuntimeException(sprintf('Cannot write to file: %s', $path));
        }
    }
}
