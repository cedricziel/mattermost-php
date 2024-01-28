<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * The request is malformed.
 */
class Default400Response extends Error
{
    use \CedricZiel\MattermostPhp\Client\ResponseTrait;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        parent::hydrate($data);
        if ($data === null) return $this;

        return $this;
    }
}
