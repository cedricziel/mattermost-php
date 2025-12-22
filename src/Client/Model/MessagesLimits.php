<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MessagesLimits
{
    public function __construct(
        public ?int $history = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return MessagesLimits The hydrated instance
     */
    public static function hydrate(?array $data): MessagesLimits
    {
        $data ??= [];

        return new self(
            history: $data['history'] ?? null,
        );
    }
}
