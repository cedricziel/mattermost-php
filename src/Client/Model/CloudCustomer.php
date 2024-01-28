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
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['creator_id'] */
        if (isset($data['creator_id'])) $this->creator_id = $data['creator_id'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var string $data['email'] */
        if (isset($data['email'])) $this->email = $data['email'];
        /** @var string $data['name'] */
        if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['num_employees'] */
        if (isset($data['num_employees'])) $this->num_employees = $data['num_employees'];
        /** @var string $data['contact_first_name'] */
        if (isset($data['contact_first_name'])) $this->contact_first_name = $data['contact_first_name'];
        /** @var string $data['contact_last_name'] */
        if (isset($data['contact_last_name'])) $this->contact_last_name = $data['contact_last_name'];
        /** @var  $data['billing_address'] */
        if (isset($data['billing_address'])) $this->billing_address = $data['billing_address'];
        /** @var  $data['company_address'] */
        if (isset($data['company_address'])) $this->company_address = $data['company_address'];
        /** @var  $data['payment_method'] */
        if (isset($data['payment_method'])) $this->payment_method = $data['payment_method'];
        return $this;
    }
}
