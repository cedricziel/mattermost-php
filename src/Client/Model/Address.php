<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Address
{
    public function __construct(
        public ?string $city = null,
        public ?string $country = null,
        public ?string $line1 = null,
        public ?string $line2 = null,
        public ?string $postal_code = null,
        public ?string $state = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['city'] */
            if (isset($data['city'])) $this->city = $data['city'];
        /** @var string $data['country'] */
            if (isset($data['country'])) $this->country = $data['country'];
        /** @var string $data['line1'] */
            if (isset($data['line1'])) $this->line1 = $data['line1'];
        /** @var string $data['line2'] */
            if (isset($data['line2'])) $this->line2 = $data['line2'];
        /** @var string $data['postal_code'] */
            if (isset($data['postal_code'])) $this->postal_code = $data['postal_code'];
        /** @var string $data['state'] */
            if (isset($data['state'])) $this->state = $data['state'];
        return $this;
    }
}
