<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RewriteMessageResponse
{
    public function __construct(
        /** The rewritten message text */
        public ?string $rewritten_text = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): RewriteMessageResponse {
        $object = new self(
            rewritten_text: isset($data['rewritten_text']) ? $data['rewritten_text'] : null,
        );
        return $object;
    }
}
