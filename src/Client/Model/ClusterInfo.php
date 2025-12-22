<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ClusterInfo
{
    public function __construct(
        public ?\stdClass $items = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ClusterInfo The hydrated instance
     */
    public static function hydrate(?array $data): ClusterInfo
    {
        $data ??= [];

        return new self(
            items: isset($data['items']) ? (object) $data['items'] : null,
        );
    }
}
