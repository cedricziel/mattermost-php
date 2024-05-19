<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostsUsage
{
    public function __construct(
        /** Total no. of posts */
        public ?int $count = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            count: isset($data['count']) ? $data['count'] : null,
        );
        return $object;
    }
}
