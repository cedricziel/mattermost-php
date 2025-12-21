<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ContentFlaggingConfig
{
    public function __construct(
        /** Flag to enable or disable content flagging feature */
        public ?bool $EnableContentFlagging = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ContentFlaggingConfig {
        $object = new self(
            EnableContentFlagging: isset($data['EnableContentFlagging']) ? $data['EnableContentFlagging'] : null,
        );
        return $object;
    }
}
