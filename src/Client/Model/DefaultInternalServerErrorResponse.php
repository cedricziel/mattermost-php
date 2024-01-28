<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Something went wrong with the server
 */
class DefaultInternalServerErrorResponse
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
