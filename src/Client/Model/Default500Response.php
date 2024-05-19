<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * There was an internal error in the server.
 */
class Default500Response extends Error
{
    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): Default500Response {
        $object = new self(
        );
        return $object;
    }
}
