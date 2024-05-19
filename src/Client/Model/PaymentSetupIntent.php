<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PaymentSetupIntent
{
    public function __construct(
        public ?string $id = null,
        public ?string $client_secret = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            client_secret: isset($data['client_secret']) ? $data['client_secret'] : null,
        );
        return $object;
    }
}
