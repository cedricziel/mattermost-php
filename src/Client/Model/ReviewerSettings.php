<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ReviewerSettings
{
    public function __construct(
        /** Whether to use common reviewers across all teams */
        public ?bool $CommonReviewers = null,
        /** Whether system administrators can act as reviewers */
        public ?bool $SystemAdminsAsReviewers = null,
        /** Whether team administrators can act as reviewers */
        public ?bool $TeamAdminsAsReviewers = null,
        /** List of user IDs designated as common reviewers */
        public ?array $CommonReviewerIds = null,
        /** Team-specific reviewer configuration, keyed by team ID */
        public ?\stdClass $TeamReviewersSetting = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return ReviewerSettings The hydrated instance
     */
    public static function hydrate(?array $data): ReviewerSettings
    {
        $data ??= [];

        return new self(
            CommonReviewers: $data['CommonReviewers'] ?? null,
            SystemAdminsAsReviewers: $data['SystemAdminsAsReviewers'] ?? null,
            TeamAdminsAsReviewers: $data['TeamAdminsAsReviewers'] ?? null,
            CommonReviewerIds: $data['CommonReviewerIds'] ?? null,
            TeamReviewersSetting: isset($data['TeamReviewersSetting']) ? (object) $data['TeamReviewersSetting'] : null,
        );
    }
}
