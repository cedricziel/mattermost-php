<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SlackAttachmentField
{
    public ?string $Title;

    /** The value of the attachment, set as string but capable with golang interface */
    public ?string $Value;
    public ?bool $Short;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->Title = $data['Title'];
        $this->Value = $data['Value'];
        $this->Short = $data['Short'];
        return $this;
    }
}
