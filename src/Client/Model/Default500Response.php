<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * There was an internal error in the server.
 */
class Default500Response extends Error
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Default500Response The hydrated instance
     */
    public static function hydrate(?array $data): Default500Response
    {
        $data ??= [];

        return new self(
        );
    }
}
