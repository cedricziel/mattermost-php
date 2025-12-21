<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LookupInteractiveDialogResponse
{
    public function __construct(
        /** List of options returned from the lookup */
        public ?array $options = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): LookupInteractiveDialogResponse {
        $object = new self(
            options: isset($data['options']) ? $data['options'] : null,
        );
        return $object;
    }
}
