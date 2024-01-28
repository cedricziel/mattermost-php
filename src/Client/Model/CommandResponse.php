<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CommandResponse
{
    /** The response type either in_channel or ephemeral */
    public ?string $ResponseType;
    public ?string $Text;
    public ?string $Username;
    public ?string $IconURL;
    public ?string $GotoLocation;
    public ?array $Attachments;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['ResponseType'] */
        if (isset($data['ResponseType'])) $this->ResponseType = $data['ResponseType'];
        /** @var string $data['Text'] */
        if (isset($data['Text'])) $this->Text = $data['Text'];
        /** @var string $data['Username'] */
        if (isset($data['Username'])) $this->Username = $data['Username'];
        /** @var string $data['IconURL'] */
        if (isset($data['IconURL'])) $this->IconURL = $data['IconURL'];
        /** @var string $data['GotoLocation'] */
        if (isset($data['GotoLocation'])) $this->GotoLocation = $data['GotoLocation'];
        /** @var array $data['Attachments'] */
        if (isset($data['Attachments'])) $this->Attachments = $data['Attachments'];
        return $this;
    }
}
