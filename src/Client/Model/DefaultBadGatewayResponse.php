<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Bad gateway
 */
class DefaultBadGatewayResponse extends AppError
{
    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DefaultBadGatewayResponse The hydrated instance
     */
    public static function hydrate(?array $data): DefaultBadGatewayResponse
    {
        $data ??= [];

        return new self(
        );
    }
}
