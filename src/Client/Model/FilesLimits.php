<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class FilesLimits
{
    public function __construct(
        public ?int $total_storage = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return FilesLimits The hydrated instance
     */
    public static function hydrate(?array $data): FilesLimits
    {
        $data ??= [];

        return new self(
            total_storage: $data['total_storage'] ?? null,
        );
    }
}
