<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Feature is disabled
 */
class DefaultNotImplementedResponse extends AppError
{
    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        return $object;
    }
}
