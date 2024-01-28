<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Address
{
    public ?string $city;
    public ?string $country;
    public ?string $line1;
    public ?string $line2;
    public ?string $postal_code;
    public ?string $state;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->city = $data['city'];
        $this->country = $data['country'];
        $this->line1 = $data['line1'];
        $this->line2 = $data['line2'];
        $this->postal_code = $data['postal_code'];
        $this->state = $data['state'];
        return $this;
    }
}
