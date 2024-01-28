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
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['Title'] */
        if (isset($data['Title'])) $this->Title = $data['Title'];
        /** @var string $data['Value'] */
        if (isset($data['Value'])) $this->Value = $data['Value'];
        /** @var bool $data['Short'] */
        if (isset($data['Short'])) $this->Short = $data['Short'];
        return $this;
    }
}
