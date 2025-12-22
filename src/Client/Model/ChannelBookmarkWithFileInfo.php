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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ChannelBookmarkWithFileInfo {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            owner_id: isset($data['owner_id']) ? $data['owner_id'] : null,
            file_id: isset($data['file_id']) ? $data['file_id'] : null,
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            sort_order: isset($data['sort_order']) ? $data['sort_order'] : null,
            link_url: isset($data['link_url']) ? $data['link_url'] : null,
            image_url: isset($data['image_url']) ? $data['image_url'] : null,
            emoji: isset($data['emoji']) ? $data['emoji'] : null,
            type: isset($data['type']) ? $data['type'] : null,
            original_id: isset($data['original_id']) ? $data['original_id'] : null,
            parent_id: isset($data['parent_id']) ? $data['parent_id'] : null,
            file: isset($data['file']) ? FileInfo::hydrate($data['file']) : null,
        );
        return $object;
    }
}
