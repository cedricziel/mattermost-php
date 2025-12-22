<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Resource requested not found.
 */
class Default404Response extends Error
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Default404Response The hydrated instance
     */
    public static function hydrate(?array $data): Default404Response
    {
        $data ??= [];

        return new self(
        );
    }
}
