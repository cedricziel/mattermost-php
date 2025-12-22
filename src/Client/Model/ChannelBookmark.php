<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelBookmark
{
    public function __construct(
        public ?string $id = null,
        /** The time in milliseconds a channel bookmark was created */
        public ?int $create_at = null,
        /** The time in milliseconds a channel bookmark was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds a channel bookmark was deleted */
        public ?int $delete_at = null,
        public ?string $channel_id = null,
        /** The ID of the user that the channel bookmark belongs to */
        public ?string $owner_id = null,
        /** The ID of the file associated with the channel bookmark */
        public ?string $file_id = null,
        public ?string $display_name = null,
        /** The order of the channel bookmark */
        public ?int $sort_order = null,
        /** The URL associated with the channel bookmark */
        public ?string $link_url = null,
        /** The URL of the image associated with the channel bookmark */
        public ?string $image_url = null,
        public ?string $emoji = null,
        public ?string $type = null,
        /** The ID of the original channel bookmark */
        public ?string $original_id = null,
        /** The ID of the parent channel bookmark */
        public ?string $parent_id = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelBookmark The hydrated instance
     */
    public static function hydrate(?array $data): ChannelBookmark
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            delete_at: $data['delete_at'] ?? null,
            channel_id: $data['channel_id'] ?? null,
            owner_id: $data['owner_id'] ?? null,
            file_id: $data['file_id'] ?? null,
            display_name: $data['display_name'] ?? null,
            sort_order: $data['sort_order'] ?? null,
            link_url: $data['link_url'] ?? null,
            image_url: $data['image_url'] ?? null,
            emoji: $data['emoji'] ?? null,
            type: $data['type'] ?? null,
            original_id: $data['original_id'] ?? null,
            parent_id: $data['parent_id'] ?? null,
        );
    }
}
