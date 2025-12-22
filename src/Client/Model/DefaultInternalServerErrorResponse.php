<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Something went wrong with the server
 */
class DefaultInternalServerErrorResponse extends AppError
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DefaultInternalServerErrorResponse The hydrated instance
     */
    public static function hydrate(?array $data): DefaultInternalServerErrorResponse
    {
        $data ??= [];

        return new self(
        );
    }
}
