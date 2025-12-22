<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TeamReviewerConfig
{
    public function __construct(
        /** Whether team-specific reviewers are enabled for this team */
        public ?bool $Enabled = null,
        /** List of user IDs designated as reviewers for this specific team */
        public ?array $ReviewerIds = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return TeamReviewerConfig The hydrated instance
     */
    public static function hydrate(?array $data): TeamReviewerConfig
    {
        $data ??= [];

        return new self(
            Enabled: $data['Enabled'] ?? null,
            ReviewerIds: $data['ReviewerIds'] ?? null,
        );
    }
}
