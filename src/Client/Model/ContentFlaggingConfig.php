<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ContentFlaggingConfig
{
    public function __construct(
        /** Flag to enable or disable content flagging feature */
        public ?bool $EnableContentFlagging = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ContentFlaggingConfig The hydrated instance
     */
    public static function hydrate(?array $data): ContentFlaggingConfig
    {
        $data ??= [];

        return new self(
            EnableContentFlagging: $data['EnableContentFlagging'] ?? null,
        );
    }
}
