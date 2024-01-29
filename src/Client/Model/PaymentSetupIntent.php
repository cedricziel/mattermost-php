<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PaymentSetupIntent
{
    public function __construct(
        public ?string $id = null,
        public ?string $client_secret = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['client_secret'] */
            if (isset($data['client_secret'])) $this->client_secret = $data['client_secret'];
        return $this;
    }
}
