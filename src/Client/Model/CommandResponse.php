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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            ResponseType: $data['ResponseType'] ?? null,
            Text: $data['Text'] ?? null,
            Username: $data['Username'] ?? null,
            IconURL: $data['IconURL'] ?? null,
            GotoLocation: $data['GotoLocation'] ?? null,
            Attachments: $data['Attachments'] ?? null,
        );
        return $object;
    }
}
