<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Access to the resource is forbidden for this user.
 */
class Default403Response extends Error
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return Default403Response The hydrated instance
     */
    public static function hydrate(?array $data): Default403Response
    {
        $data ??= [];

        return new self(
        );
    }
}
