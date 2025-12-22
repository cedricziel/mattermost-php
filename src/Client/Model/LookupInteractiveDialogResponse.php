<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class LookupInteractiveDialogResponse
{
    public function __construct(
        /** List of options returned from the lookup */
        public ?array $options = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return LookupInteractiveDialogResponse The hydrated instance
     */
    public static function hydrate(?array $data): LookupInteractiveDialogResponse
    {
        $data ??= [];

        return new self(
            options: $data['options'] ?? null,
        );
    }
}
