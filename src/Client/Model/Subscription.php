<?php

namespace CedricZiel\MattermostPhp\Client;

class Subscription
{
    public ?string $id;
    public ?string $customer_id;
    public ?string $product_id;
    public ?array $add_ons;
    public ?int $start_at;
    public ?int $end_at;
    public ?int $create_at;
    public ?int $seats;
    public ?string $dns;
}
;