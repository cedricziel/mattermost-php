<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class FileInfoList
{
    public function __construct(
        public ?array $order = null,
        public ?\stdClass $file_infos = null,
        /** The ID of next file info. Not omitted when empty or not relevant. */
        public ?string $next_file_id = null,
        /** The ID of previous file info. Not omitted when empty or not relevant. */
        public ?string $prev_file_id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            order: $data['order'] ?? null,
            file_infos: (object) $data['file_infos'] ?? null,
            next_file_id: $data['next_file_id'] ?? null,
            prev_file_id: $data['prev_file_id'] ?? null,
        );
        return $object;
    }
}
