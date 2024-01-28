<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LicenseRenewalLink
{
    /** License renewal link */
    public ?string $renewal_link;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->renewal_link = $data['renewal_link'];
        return $this;
    }
}
