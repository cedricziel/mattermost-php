<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class DataRetentionPolicyForTeam
{
    public function __construct(
        /** The team ID. */
        public ?string $team_id = null,
        /** The number of days a message will be retained before being deleted by this policy. */
        public ?int $post_duration = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            team_id: isset($data['team_id']) ? $data['team_id'] : null,
            post_duration: isset($data['post_duration']) ? $data['post_duration'] : null,
        );
        return $object;
    }
}
