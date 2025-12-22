<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlFieldsAutocompleteResponse
{
    public function __construct(
        public ?array $fields = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AccessControlFieldsAutocompleteResponse The hydrated instance
     */
    public static function hydrate(?array $data): AccessControlFieldsAutocompleteResponse
    {
        $data ??= [];

        return new self(
            fields: $data['fields'] ?? null,
        );
    }
}
