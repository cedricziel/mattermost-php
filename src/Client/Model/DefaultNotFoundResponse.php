<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Resource not found
 */
class DefaultNotFoundResponse extends AppError
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DefaultNotFoundResponse The hydrated instance
     */
    public static function hydrate(?array $data): DefaultNotFoundResponse
    {
        $data ??= [];

        return new self(
        );
    }
}
