<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Resource requested not found.
 */
class Default404Response extends Error
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
