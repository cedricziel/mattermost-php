<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CloudCustomer
{
    public ?string $id;
    public ?string $creator_id;
    public ?int $create_at;
    public ?string $email;
    public ?string $name;
    public ?string $num_employees;
    public ?string $contact_first_name;
    public ?string $contact_last_name;
    public $billing_address;
    public $company_address;
    public $payment_method;
}
;