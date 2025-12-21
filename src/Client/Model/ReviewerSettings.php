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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ReviewerSettings {
        $object = new self(
            CommonReviewers: isset($data['CommonReviewers']) ? $data['CommonReviewers'] : null,
            SystemAdminsAsReviewers: isset($data['SystemAdminsAsReviewers']) ? $data['SystemAdminsAsReviewers'] : null,
            TeamAdminsAsReviewers: isset($data['TeamAdminsAsReviewers']) ? $data['TeamAdminsAsReviewers'] : null,
            CommonReviewerIds: isset($data['CommonReviewerIds']) ? $data['CommonReviewerIds'] : null,
            TeamReviewersSetting: isset($data['TeamReviewersSetting']) ? $data['TeamReviewersSetting'] : null,
        );
        return $object;
    }
}
