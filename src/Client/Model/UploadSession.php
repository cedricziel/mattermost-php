<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * an object containing information used to keep track of a file upload.
 */
class UploadSession
{
    public function __construct(
        /** The unique identifier for the upload. */
        public ?string $id = null,
        /** The type of the upload. */
        public ?string $type = null,
        /** The time the upload was created in milliseconds. */
        public ?int $create_at = null,
        /** The ID of the user performing the upload. */
        public ?string $user_id = null,
        /** The ID of the channel to upload to. */
        public ?string $channel_id = null,
        /** The name of the file to upload. */
        public ?string $filename = null,
        /** The size of the file to upload in bytes. */
        public ?int $file_size = null,
        /** The amount of data uploaded in bytes. */
        public ?int $file_offset = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['type'] */
            if (isset($data['type'])) $this->type = $data['type'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var string $data['user_id'] */
            if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['channel_id'] */
            if (isset($data['channel_id'])) $this->channel_id = $data['channel_id'];
        /** @var string $data['filename'] */
            if (isset($data['filename'])) $this->filename = $data['filename'];
        /** @var int $data['file_size'] */
            if (isset($data['file_size'])) $this->file_size = $data['file_size'];
        /** @var int $data['file_offset'] */
            if (isset($data['file_offset'])) $this->file_offset = $data['file_offset'];
        return $this;
    }
}
