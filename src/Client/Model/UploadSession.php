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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            type: isset($data['type']) ? $data['type'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            filename: isset($data['filename']) ? $data['filename'] : null,
            file_size: isset($data['file_size']) ? $data['file_size'] : null,
            file_offset: isset($data['file_offset']) ? $data['file_offset'] : null,
        );
        return $object;
    }
}
