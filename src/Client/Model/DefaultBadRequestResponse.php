<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Invalid or missing parameters in URL or request body
 */
class DefaultBadRequestResponse extends AppError
{
    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
        );
        return $object;
    }
}
