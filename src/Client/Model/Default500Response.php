<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * There was an internal error in the server.
 */
class Default500Response
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
