<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ClusterInfo
{
    public function __construct(
        public ?\stdClass $items = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ClusterInfo {
        $object = new self(
            items: isset($data['items']) ? $data['items'] : null,
        );
        return $object;
    }
}
