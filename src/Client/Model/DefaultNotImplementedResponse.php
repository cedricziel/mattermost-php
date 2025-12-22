<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Feature is disabled
 */
class DefaultNotImplementedResponse extends AppError
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DefaultNotImplementedResponse The hydrated instance
     */
    public static function hydrate(?array $data): DefaultNotImplementedResponse
    {
        $data ??= [];

        return new self(
        );
    }
}
