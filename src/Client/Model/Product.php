<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Product
{
    public ?string $id;
    public ?string $name;
    public ?string $description;
    public ?string $price_per_seat;
    public ?array $add_ons;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->price_per_seat = $data['price_per_seat'];
        $this->add_ons = $data['add_ons'];
        return $this;
    }
}
