<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class FilesLimits
{
    public function __construct(
        public ?int $total_storage = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static {
        $object = new self(
            total_storage: isset($data['total_storage']) ? $data['total_storage'] : null,
        );
        return $object;
    }
}
