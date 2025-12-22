<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SlackAttachmentField
{
    public function __construct(
        public ?string $Title = null,
        /** The value of the attachment, set as string but capable with golang interface */
        public ?string $Value = null,
        public ?bool $Short = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return SlackAttachmentField The hydrated instance
     */
    public static function hydrate(?array $data): SlackAttachmentField
    {
        $data ??= [];

        return new self(
            Title: $data['Title'] ?? null,
            Value: $data['Value'] ?? null,
            Short: $data['Short'] ?? null,
        );
    }
}
