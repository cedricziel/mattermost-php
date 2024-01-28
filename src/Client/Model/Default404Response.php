<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Resource requested not found.
 */
class Default404Response
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
