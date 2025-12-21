<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MessageDescriptor
{
    public function __construct(
        /** The i18n message ID */
        public ?string $id = null,
        /** The default message text */
        public ?string $defaultMessage = null,
        /** Optional values for message interpolation */
        public ?\stdClass $values = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): MessageDescriptor {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            defaultMessage: isset($data['defaultMessage']) ? $data['defaultMessage'] : null,
            values: isset($data['values']) ? $data['values'] : null,
        );
        return $object;
    }
}
