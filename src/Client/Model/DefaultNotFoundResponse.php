<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Resource not found
 */
class DefaultNotFoundResponse extends AppError
{
    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
        );
        return $object;
    }
}
