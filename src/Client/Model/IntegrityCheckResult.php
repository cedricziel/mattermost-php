<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * an object with the result of the integrity check.
 */
class IntegrityCheckResult
{
    public function __construct(
        public $data = null,
        /** a string value set in case of error. */
        public ?string $err = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var  $data['data'] */
            if (isset($data['data'])) $this->data = $data['data'];
        /** @var string $data['err'] */
            if (isset($data['err'])) $this->err = $data['err'];
        return $this;
    }
}
