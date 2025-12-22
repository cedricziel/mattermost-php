<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Do not have appropriate permissions
 */
class DefaultForbiddenResponse extends AppError
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DefaultForbiddenResponse The hydrated instance
     */
    public static function hydrate(?array $data): DefaultForbiddenResponse
    {
        $data ??= [];

        return new self(
        );
    }
}
