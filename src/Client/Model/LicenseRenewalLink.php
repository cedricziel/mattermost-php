<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LicenseRenewalLink
{
    public function __construct(
        /** License renewal link */
        public ?string $renewal_link = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return LicenseRenewalLink The hydrated instance
     */
    public static function hydrate(?array $data): LicenseRenewalLink
    {
        $data ??= [];

        return new self(
            renewal_link: $data['renewal_link'] ?? null,
        );
    }
}
