<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * The request is malformed.
 */
class Default400Response extends Error
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Default400Response The hydrated instance
     */
    public static function hydrate(?array $data): Default400Response
    {
        $data ??= [];

        return new self(
        );
    }
}
