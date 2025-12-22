<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PaymentSetupIntent
{
    public function __construct(
        public ?string $id = null,
        public ?string $client_secret = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PaymentSetupIntent The hydrated instance
     */
    public static function hydrate(?array $data): PaymentSetupIntent
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            client_secret: $data['client_secret'] ?? null,
        );
    }
}
