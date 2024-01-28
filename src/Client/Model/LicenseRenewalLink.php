<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LicenseRenewalLink
{
    /** License renewal link */
    public ?string $renewal_link;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['renewal_link'] */
        if (isset($data['renewal_link'])) $this->renewal_link = $data['renewal_link'];
        return $this;
    }
}
