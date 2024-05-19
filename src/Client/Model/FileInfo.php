<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class FileInfo
{
    public function __construct(
        /** The unique identifier for this file */
        public ?string $id = null,
        /** The ID of the user that uploaded this file */
        public ?string $user_id = null,
        /** If this file is attached to a post, the ID of that post */
        public ?string $post_id = null,
        /** The time in milliseconds a file was created */
        public ?int $create_at = null,
        /** The time in milliseconds a file was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds a file was deleted */
        public ?int $delete_at = null,
        /** The name of the file */
        public ?string $name = null,
        /** The extension at the end of the file name */
        public ?string $extension = null,
        /** The size of the file in bytes */
        public ?int $size = null,
        /** The MIME type of the file */
        public ?string $mime_type = null,
        /** If this file is an image, the width of the file */
        public ?int $width = null,
        /** If this file is an image, the height of the file */
        public ?int $height = null,
        /** If this file is an image, whether or not it has a preview-sized version */
        public ?bool $has_preview_image = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): FileInfo {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            user_id: isset($data['user_id']) ? $data['user_id'] : null,
            post_id: isset($data['post_id']) ? $data['post_id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            name: isset($data['name']) ? $data['name'] : null,
            extension: isset($data['extension']) ? $data['extension'] : null,
            size: isset($data['size']) ? $data['size'] : null,
            mime_type: isset($data['mime_type']) ? $data['mime_type'] : null,
            width: isset($data['width']) ? $data['width'] : null,
            height: isset($data['height']) ? $data['height'] : null,
            has_preview_image: isset($data['has_preview_image']) ? $data['has_preview_image'] : null,
        );
        return $object;
    }
}
