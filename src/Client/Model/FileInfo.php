<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class FileInfo
{
    /** The unique identifier for this file */
    public ?string $id;

    /** The ID of the user that uploaded this file */
    public ?string $user_id;

    /** If this file is attached to a post, the ID of that post */
    public ?string $post_id;

    /** The time in milliseconds a file was created */
    public ?int $create_at;

    /** The time in milliseconds a file was last updated */
    public ?int $update_at;

    /** The time in milliseconds a file was deleted */
    public ?int $delete_at;

    /** The name of the file */
    public ?string $name;

    /** The extension at the end of the file name */
    public ?string $extension;

    /** The size of the file in bytes */
    public ?int $size;

    /** The MIME type of the file */
    public ?string $mime_type;

    /** If this file is an image, the width of the file */
    public ?int $width;

    /** If this file is an image, the height of the file */
    public ?int $height;

    /** If this file is an image, whether or not it has a preview-sized version */
    public ?bool $has_preview_image;
}
