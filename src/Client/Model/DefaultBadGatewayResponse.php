<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Bad gateway
 */
class DefaultBadGatewayResponse extends AppError
{
    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): DefaultBadGatewayResponse {
        $object = new self(
        );
        return $object;
    }
}
