<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CheckUserMfaResponse
{
    public function __construct(
        /** Value will `true` if MFA is active, `false` otherwise */
        public ?bool $mfa_required = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return CheckUserMfaResponse The hydrated instance
     */
    public static function hydrate(?array $data): CheckUserMfaResponse
    {
        $data ??= [];

        return new self(
            mfa_required: $data['mfa_required'] ?? null,
        );
    }
}
