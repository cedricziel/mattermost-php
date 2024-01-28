<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * The request is malformed.
 */
class Default400Response
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
