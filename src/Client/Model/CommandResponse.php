<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CommandResponse
{
    public function __construct(
        /** The response type either in_channel or ephemeral */
        public ?string $ResponseType = null,
        public ?string $Text = null,
        public ?string $Username = null,
        public ?string $IconURL = null,
        public ?string $GotoLocation = null,
        public ?array $Attachments = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return CommandResponse The hydrated instance
     */
    public static function hydrate(?array $data): CommandResponse
    {
        $data ??= [];

        return new self(
            ResponseType: $data['ResponseType'] ?? null,
            Text: $data['Text'] ?? null,
            Username: $data['Username'] ?? null,
            IconURL: $data['IconURL'] ?? null,
            GotoLocation: $data['GotoLocation'] ?? null,
            Attachments: $data['Attachments'] ?? null,
        );
    }
}
