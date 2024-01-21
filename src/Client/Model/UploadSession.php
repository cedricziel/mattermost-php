<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * an object containing information used to keep track of a file upload.
 */
class UploadSession
{
    /** The unique identifier for the upload. */
    public ?string $id;

    /** The type of the upload. */
    public ?string $type;

    /** The time the upload was created in milliseconds. */
    public ?int $create_at;

    /** The ID of the user performing the upload. */
    public ?string $user_id;

    /** The ID of the channel to upload to. */
    public ?string $channel_id;

    /** The name of the file to upload. */
    public ?string $filename;

    /** The size of the file to upload in bytes. */
    public ?int $file_size;

    /** The amount of data uploaded in bytes. */
    public ?int $file_offset;
}
;