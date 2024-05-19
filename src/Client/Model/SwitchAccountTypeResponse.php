<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SwitchAccountTypeResponse
{
    public function __construct(
        /** The link for the user to follow to login or to complete the account switching when the current service is OAuth2/SAML */
        public ?string $follow_link = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            follow_link: isset($data['follow_link']) ? $data['follow_link'] : null,
        );
        return $object;
    }
}
