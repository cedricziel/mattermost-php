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
}
;