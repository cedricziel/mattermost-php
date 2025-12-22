<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class RewriteMessageResponse
{
    public function __construct(
        /** The rewritten message text */
        public ?string $rewritten_text = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return RewriteMessageResponse The hydrated instance
     */
    public static function hydrate(?array $data): RewriteMessageResponse
    {
        $data ??= [];

        return new self(
            rewritten_text: $data['rewritten_text'] ?? null,
        );
    }
}
