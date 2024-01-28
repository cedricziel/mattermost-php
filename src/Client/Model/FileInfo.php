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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
        if (isset($data['id'])) $this->id = $data['id'];
        /** @var string $data['user_id'] */
        if (isset($data['user_id'])) $this->user_id = $data['user_id'];
        /** @var string $data['post_id'] */
        if (isset($data['post_id'])) $this->post_id = $data['post_id'];
        /** @var int $data['create_at'] */
        if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
        if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
        if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var string $data['name'] */
        if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['extension'] */
        if (isset($data['extension'])) $this->extension = $data['extension'];
        /** @var int $data['size'] */
        if (isset($data['size'])) $this->size = $data['size'];
        /** @var string $data['mime_type'] */
        if (isset($data['mime_type'])) $this->mime_type = $data['mime_type'];
        /** @var int $data['width'] */
        if (isset($data['width'])) $this->width = $data['width'];
        /** @var int $data['height'] */
        if (isset($data['height'])) $this->height = $data['height'];
        /** @var bool $data['has_preview_image'] */
        if (isset($data['has_preview_image'])) $this->has_preview_image = $data['has_preview_image'];
        return $this;
    }
}
