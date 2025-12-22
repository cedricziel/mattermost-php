<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Invalid or missing parameters in URL or request body
 */
class DefaultBadRequestResponse extends AppError
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DefaultBadRequestResponse The hydrated instance
     */
    public static function hydrate(?array $data): DefaultBadRequestResponse
    {
        $data ??= [];

        return new self(
        );
    }
}
