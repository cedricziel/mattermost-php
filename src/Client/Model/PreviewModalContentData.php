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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): PreviewModalContentData {
        $object = new self(
            skuLabel: isset($data['skuLabel']) ? $data['skuLabel'] : null,
            title: isset($data['title']) ? $data['title'] : null,
            subtitle: isset($data['subtitle']) ? $data['subtitle'] : null,
            videoUrl: isset($data['videoUrl']) ? $data['videoUrl'] : null,
            videoPoster: isset($data['videoPoster']) ? $data['videoPoster'] : null,
            useCase: isset($data['useCase']) ? $data['useCase'] : null,
        );
        return $object;
    }
}
