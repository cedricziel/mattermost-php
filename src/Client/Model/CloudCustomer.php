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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->id = $data['id'];
        $this->creator_id = $data['creator_id'];
        $this->create_at = $data['create_at'];
        $this->email = $data['email'];
        $this->name = $data['name'];
        $this->num_employees = $data['num_employees'];
        $this->contact_first_name = $data['contact_first_name'];
        $this->contact_last_name = $data['contact_last_name'];
        $this->billing_address = $data['billing_address'];
        $this->company_address = $data['company_address'];
        $this->payment_method = $data['payment_method'];
        return $this;
    }
}
