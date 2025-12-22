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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return DataRetentionPolicyForTeam The hydrated instance
     */
    public static function hydrate(?array $data): DataRetentionPolicyForTeam
    {
        $data ??= [];

        return new self(
            team_id: $data['team_id'] ?? null,
            post_duration: $data['post_duration'] ?? null,
        );
    }
}
