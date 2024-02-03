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
            id: isset($data['id']) ? $data['id'] : null,
            creator_id: isset($data['creator_id']) ? $data['creator_id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            email: isset($data['email']) ? $data['email'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            num_employees: isset($data['num_employees']) ? $data['num_employees'] : null,
            contact_first_name: isset($data['contact_first_name']) ? $data['contact_first_name'] : null,
            contact_last_name: isset($data['contact_last_name']) ? $data['contact_last_name'] : null,
            billing_address: isset($data['billing_address']) ? $data['billing_address'] : null,
            company_address: isset($data['company_address']) ? $data['company_address'] : null,
            payment_method: isset($data['payment_method']) ? $data['payment_method'] : null,
        );
        return $object;
    }
}
