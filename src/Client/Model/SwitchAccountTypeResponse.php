<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SwitchAccountTypeResponse
{
    public function __construct(
        /** The link for the user to follow to login or to complete the account switching when the current service is OAuth2/SAML */
        public ?string $follow_link = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return SwitchAccountTypeResponse The hydrated instance
     */
    public static function hydrate(?array $data): SwitchAccountTypeResponse
    {
        $data ??= [];

        return new self(
            follow_link: $data['follow_link'] ?? null,
        );
    }
}
