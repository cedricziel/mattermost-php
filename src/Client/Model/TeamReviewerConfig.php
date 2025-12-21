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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): TeamReviewerConfig {
        $object = new self(
            Enabled: isset($data['Enabled']) ? $data['Enabled'] : null,
            ReviewerIds: isset($data['ReviewerIds']) ? $data['ReviewerIds'] : null,
        );
        return $object;
    }
}
