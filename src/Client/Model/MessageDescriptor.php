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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return MessageDescriptor The hydrated instance
     */
    public static function hydrate(?array $data): MessageDescriptor
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            defaultMessage: $data['defaultMessage'] ?? null,
            values: isset($data['values']) ? (object) $data['values'] : null,
        );
    }
}
