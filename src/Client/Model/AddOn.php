<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AddOn
{
    public ?string $id;
    public ?string $name;
    public ?string $display_name;
    public ?string $price_per_seat;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->display_name = $data['display_name'];
        $this->price_per_seat = $data['price_per_seat'];
        return $this;
    }
}
