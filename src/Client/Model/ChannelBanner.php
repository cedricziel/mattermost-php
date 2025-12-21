<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelBanner
{
    public function __construct(
        /** enabled indicates whether the channel banner is enabled or not */
        public ?bool $enabled = null,
        /** text is the actual text that renders in the channel banner. Markdown is supported. */
        public ?string $text = null,
        /** background_color is the HEX color code for the banner's background */
        public ?string $background_color = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ChannelBanner {
        $object = new self(
            enabled: isset($data['enabled']) ? $data['enabled'] : null,
            text: isset($data['text']) ? $data['text'] : null,
            background_color: isset($data['background_color']) ? $data['background_color'] : null,
        );
        return $object;
    }
}
