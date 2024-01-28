<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PaymentSetupIntent
{
    public ?string $id;
    public ?string $client_secret;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->client_secret = $data['client_secret'];
        return $this;
    }
}
