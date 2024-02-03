<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LicenseRenewalLink
{
    public function __construct(
        /** License renewal link */
        public ?string $renewal_link = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            renewal_link: $data['renewal_link'] ?? null,
        );
        return $object;
    }
}
