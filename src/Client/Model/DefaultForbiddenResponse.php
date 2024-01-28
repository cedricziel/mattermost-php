<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Do not have appropriate permissions
 */
class DefaultForbiddenResponse
{
    use \CedricZiel\MattermostPhp\Client\ResponseTrait;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;

        return $this;
    }
}
