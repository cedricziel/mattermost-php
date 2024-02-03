<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Too many requests
 */
class DefaultTooManyRequestsResponse extends AppError
{
    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
        );
        return $object;
    }
}
