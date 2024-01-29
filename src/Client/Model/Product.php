<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Product
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $price_per_seat = null,
        public ?array $add_ons = null,
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
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['price_per_seat'] */
            if (isset($data['price_per_seat'])) $this->price_per_seat = $data['price_per_seat'];
        /** @var array $data['add_ons'] */
            if (isset($data['add_ons'])) $this->add_ons = $data['add_ons'];
        return $this;
    }
}
