<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * No access token provided
 */
class DefaultUnauthorizedResponse extends AppError
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