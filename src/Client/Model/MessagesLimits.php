<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class MessagesLimits
{
    public function __construct(
        public ?int $history = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): MessagesLimits {
        $object = new self(
            history: isset($data['history']) ? $data['history'] : null,
        );
        return $object;
    }
}
