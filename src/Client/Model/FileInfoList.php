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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var array $data['order'] */
            if (isset($data['order'])) $this->order = $data['order'];
        /** @var stdClass $data['file_infos'] */
            if (isset($data['file_infos'])) $this->file_infos = (object) $data['file_infos'];
        /** @var string $data['next_file_id'] */
            if (isset($data['next_file_id'])) $this->next_file_id = $data['next_file_id'];
        /** @var string $data['prev_file_id'] */
            if (isset($data['prev_file_id'])) $this->prev_file_id = $data['prev_file_id'];
        return $this;
    }
}
