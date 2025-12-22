<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PreviewModalContentData
{
    public function __construct(
        public $skuLabel = null,
        public $title = null,
        public $subtitle = null,
        /** URL of the video content */
        public ?string $videoUrl = null,
        /** URL of the video poster/thumbnail image */
        public ?string $videoPoster = null,
        /** The use case category for this content */
        public ?string $useCase = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PreviewModalContentData The hydrated instance
     */
    public static function hydrate(?array $data): PreviewModalContentData
    {
        $data ??= [];

        return new self(
            skuLabel: $data['skuLabel'] ?? null,
            title: $data['title'] ?? null,
            subtitle: $data['subtitle'] ?? null,
            videoUrl: $data['videoUrl'] ?? null,
            videoPoster: $data['videoPoster'] ?? null,
            useCase: $data['useCase'] ?? null,
        );
    }
}
