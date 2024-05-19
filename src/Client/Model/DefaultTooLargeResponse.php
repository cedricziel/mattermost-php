<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Content too large
 */
class DefaultTooLargeResponse extends AppError
{
    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): DefaultTooLargeResponse {
        $object = new self(
        );
        return $object;
    }
}
