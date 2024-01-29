<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AddOn
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $display_name = null,
        public ?string $price_per_seat = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['name'] */
            if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var string $data['price_per_seat'] */
            if (isset($data['price_per_seat'])) $this->price_per_seat = $data['price_per_seat'];
        return $this;
    }
}
