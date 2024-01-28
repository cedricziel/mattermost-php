<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PaymentMethod
{
    public ?string $type;
    public ?int $last_four;
    public ?int $exp_month;
    public ?int $exp_year;
    public ?string $card_brand;
    public ?string $name;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->type = $data['type'];
        $this->last_four = $data['last_four'];
        $this->exp_month = $data['exp_month'];
        $this->exp_year = $data['exp_year'];
        $this->card_brand = $data['card_brand'];
        $this->name = $data['name'];
        return $this;
    }
}
