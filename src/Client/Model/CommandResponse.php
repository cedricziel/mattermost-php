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
            ResponseType: isset($data['ResponseType']) ? $data['ResponseType'] : null,
            Text: isset($data['Text']) ? $data['Text'] : null,
            Username: isset($data['Username']) ? $data['Username'] : null,
            IconURL: isset($data['IconURL']) ? $data['IconURL'] : null,
            GotoLocation: isset($data['GotoLocation']) ? $data['GotoLocation'] : null,
            Attachments: isset($data['Attachments']) ? $data['Attachments'] : null,
        );
        return $object;
    }
}
