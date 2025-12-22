<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PostsUsage
{
    public function __construct(
        /** Total no. of posts */
        public ?int $count = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return PostsUsage The hydrated instance
     */
    public static function hydrate(?array $data): PostsUsage
    {
        $data ??= [];

        return new self(
            count: $data['count'] ?? null,
        );
    }
}
