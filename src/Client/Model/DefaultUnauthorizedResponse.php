<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * No access token provided
 */
class DefaultUnauthorizedResponse extends AppError
{
    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        return $object;
    }
}
