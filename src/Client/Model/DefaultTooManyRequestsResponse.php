<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Too many requests
 */
class DefaultTooManyRequestsResponse extends AppError
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DefaultTooManyRequestsResponse The hydrated instance
     */
    public static function hydrate(?array $data): DefaultTooManyRequestsResponse
    {
        $data ??= [];

        return new self(
        );
    }
}
