<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Content too large
 */
class DefaultTooLargeResponse extends AppError
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DefaultTooLargeResponse The hydrated instance
     */
    public static function hydrate(?array $data): DefaultTooLargeResponse
    {
        $data ??= [];

        return new self(
        );
    }
}
