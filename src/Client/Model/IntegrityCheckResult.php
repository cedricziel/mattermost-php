<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * an object with the result of the integrity check.
 */
class IntegrityCheckResult
{
    public $data;

    /** a string value set in case of error. */
    public ?string $err;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->data = $data['data'];
        $this->err = $data['err'];
        return $this;
    }
}
