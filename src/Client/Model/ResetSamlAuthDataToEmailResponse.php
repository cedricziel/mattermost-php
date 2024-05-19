<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ResetSamlAuthDataToEmailResponse
{
    public function __construct(
        /** The number of users whose AuthData field was reset. */
        public ?int $num_affected = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ResetSamlAuthDataToEmailResponse {
        $object = new self(
            num_affected: isset($data['num_affected']) ? $data['num_affected'] : null,
        );
        return $object;
    }
}
