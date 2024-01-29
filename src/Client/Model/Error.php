<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Error
{
    public function __construct(
        /** A message with the error description. */
        public ?string $error = null,
        /** Further details on where and why this error happened. */
        public ?string $details = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['error'] */
            if (isset($data['error'])) $this->error = $data['error'];
        /** @var string $data['details'] */
            if (isset($data['details'])) $this->details = $data['details'];
        return $this;
    }
}
