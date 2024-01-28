<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class FileInfoList
{
    public ?array $order;
    public ?\stdClass $file_infos;

    /** The ID of next file info. Not omitted when empty or not relevant. */
    public ?string $next_file_id;

    /** The ID of previous file info. Not omitted when empty or not relevant. */
    public ?string $prev_file_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->order = $data['order'];
        $this->file_infos = $data['file_infos'];
        $this->next_file_id = $data['next_file_id'];
        $this->prev_file_id = $data['prev_file_id'];
        return $this;
    }
}
