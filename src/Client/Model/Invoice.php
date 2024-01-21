<?php

namespace CedricZiel\MattermostPhp\Client;

class Invoice
{
    public ?string $id;
    public ?string $number;
    public ?int $create_at;
    public ?int $total;
    public ?int $tax;
    public ?string $status;
    public ?int $period_start;
    public ?int $period_end;
    public ?string $subscription_id;
    public ?array $item;
}
;