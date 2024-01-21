<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateUploadRequest
{
    public function __construct(
        /** The ID of the channel to upload to. */
        public ?string $channel_id = null,
        /** The name of the file to upload. */
        public ?string $filename = null,
        /** The size of the file to upload in bytes. */
        public ?int $file_size = null,
    ) {
    }
}
