<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ResetSamlAuthDataToEmailResponse
{
    public function __construct(
        /** The number of users whose AuthData field was reset. */
        public ?int $num_affected = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ResetSamlAuthDataToEmailResponse The hydrated instance
     */
    public static function hydrate(?array $data): ResetSamlAuthDataToEmailResponse
    {
        $data ??= [];

        return new self(
            num_affected: $data['num_affected'] ?? null,
        );
    }
}
