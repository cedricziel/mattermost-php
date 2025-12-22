<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ChannelBookmarkWithFileInfo extends ChannelBookmark
{
    public function __construct(
        ?string $id = null,
        ?int $create_at = null,
        ?int $update_at = null,
        ?int $delete_at = null,
        ?string $channel_id = null,
        ?string $owner_id = null,
        ?string $file_id = null,
        ?string $display_name = null,
        ?int $sort_order = null,
        ?string $link_url = null,
        ?string $image_url = null,
        ?string $emoji = null,
        ?string $type = null,
        ?string $original_id = null,
        ?string $parent_id = null,
        public ?FileInfo $file = null,
    ) {
        parent::__construct(id: $id, create_at: $create_at, update_at: $update_at, delete_at: $delete_at, channel_id: $channel_id, owner_id: $owner_id, file_id: $file_id, display_name: $display_name, sort_order: $sort_order, link_url: $link_url, image_url: $image_url, emoji: $emoji, type: $type, original_id: $original_id, parent_id: $parent_id);
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ChannelBookmarkWithFileInfo The hydrated instance
     */
    public static function hydrate(?array $data): ChannelBookmarkWithFileInfo
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
            file: isset($data['file']) ? FileInfo::hydrate($data['file']) : null,
        );
    }
}
