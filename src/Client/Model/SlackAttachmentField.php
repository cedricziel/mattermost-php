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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            Title: isset($data['Title']) ? $data['Title'] : null,
            Value: isset($data['Value']) ? $data['Value'] : null,
            Short: isset($data['Short']) ? $data['Short'] : null,
        );
        return $object;
    }
}
