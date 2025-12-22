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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelBanner The hydrated instance
     */
    public static function hydrate(?array $data): ChannelBanner
    {
        $data ??= [];

        return new self(
            enabled: $data['enabled'] ?? null,
            text: $data['text'] ?? null,
            background_color: $data['background_color'] ?? null,
        );
    }
}
