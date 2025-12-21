<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AccessControlFieldsAutocompleteResponse
{
    public function __construct(
        public ?array $fields = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): AccessControlFieldsAutocompleteResponse {
        $object = new self(
            fields: isset($data['fields']) ? $data['fields'] : null,
        );
        return $object;
    }
}
