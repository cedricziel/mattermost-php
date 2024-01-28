<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Access to the resource is forbidden for this user.
 */
class Default403Response
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
