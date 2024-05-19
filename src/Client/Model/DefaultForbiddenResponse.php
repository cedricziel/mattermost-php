<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Do not have appropriate permissions
 */
class DefaultForbiddenResponse extends AppError
{
    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): DefaultForbiddenResponse {
        $object = new self(
        );
        return $object;
    }
}
