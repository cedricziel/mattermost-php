<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CheckUserMfaResponse
{
    public function __construct(
        /** Value will `true` if MFA is active, `false` otherwise */
        public ?bool $mfa_required = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            mfa_required: isset($data['mfa_required']) ? $data['mfa_required'] : null,
        );
        return $object;
    }
}
