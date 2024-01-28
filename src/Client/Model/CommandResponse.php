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
        $this->ResponseType = $data['ResponseType'];
        $this->Text = $data['Text'];
        $this->Username = $data['Username'];
        $this->IconURL = $data['IconURL'];
        $this->GotoLocation = $data['GotoLocation'];
        $this->Attachments = $data['Attachments'];
        return $this;
    }
}
