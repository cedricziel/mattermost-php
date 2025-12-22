<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Client;

use Psr\Http\Message\StreamInterface;

trait FormEncodedTrait
{
    /**
     * Create a form-urlencoded request body from an array of fields.
     *
     * @param array<string, mixed> $fields Array of field name => value pairs
     * @return array{body: StreamInterface, contentType: string}
     */
    protected function createFormEncodedBody(array $fields): array
    {
        // Filter out null values
        $fields = array_filter($fields, static fn ($value): bool => $value !== null);

        // Build query string using RFC 3986 encoding
        $body = http_build_query($fields, '', '&', PHP_QUERY_RFC3986);

        return [
            'body' => $this->streamFactory->createStream($body),
            'contentType' => 'application/x-www-form-urlencoded',
        ];
    }
}
