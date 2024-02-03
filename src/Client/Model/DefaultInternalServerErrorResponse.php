<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Something went wrong with the server
 */
class DefaultInternalServerErrorResponse extends AppError
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
