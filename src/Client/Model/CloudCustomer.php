<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CloudCustomer
{
    public function __construct(
        public ?string $id = null,
        public ?string $creator_id = null,
        public ?int $create_at = null,
        public ?string $email = null,
        public ?string $name = null,
        public ?string $num_employees = null,
        public ?string $contact_first_name = null,
        public ?string $contact_last_name = null,
        public $billing_address = null,
        public $company_address = null,
        public $payment_method = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            creator_id: $data['creator_id'] ?? null,
            create_at: $data['create_at'] ?? null,
            email: $data['email'] ?? null,
            name: $data['name'] ?? null,
            num_employees: $data['num_employees'] ?? null,
            contact_first_name: $data['contact_first_name'] ?? null,
            contact_last_name: $data['contact_last_name'] ?? null,
            billing_address: $data['billing_address'] ?? null,
            company_address: $data['company_address'] ?? null,
            payment_method: $data['payment_method'] ?? null,
        );
        return $object;
    }
}
