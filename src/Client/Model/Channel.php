<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Channel
{
    public function __construct(
        public ?string $id = null,
        /** The time in milliseconds a channel was created */
        public ?int $create_at = null,
        /** The time in milliseconds a channel was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds a channel was deleted */
        public ?int $delete_at = null,
        public ?string $team_id = null,
        public ?string $type = null,
        public ?string $display_name = null,
        public ?string $name = null,
        public ?string $header = null,
        public ?string $purpose = null,
        /** The time in milliseconds of the last post of a channel */
        public ?int $last_post_at = null,
        public ?int $total_msg_count = null,
        /** Deprecated in Mattermost 5.0 release */
        public ?int $extra_update_at = null,
        public ?string $creator_id = null,
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
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
            if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
            if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var string $data['team_id'] */
            if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var string $data['type'] */
            if (isset($data['type'])) $this->type = $data['type'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var string $data['name'] */
            if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['header'] */
            if (isset($data['header'])) $this->header = $data['header'];
        /** @var string $data['purpose'] */
            if (isset($data['purpose'])) $this->purpose = $data['purpose'];
        /** @var int $data['last_post_at'] */
            if (isset($data['last_post_at'])) $this->last_post_at = $data['last_post_at'];
        /** @var int $data['total_msg_count'] */
            if (isset($data['total_msg_count'])) $this->total_msg_count = $data['total_msg_count'];
        /** @var int $data['extra_update_at'] */
            if (isset($data['extra_update_at'])) $this->extra_update_at = $data['extra_update_at'];
        /** @var string $data['creator_id'] */
            if (isset($data['creator_id'])) $this->creator_id = $data['creator_id'];
        return $this;
    }
}
