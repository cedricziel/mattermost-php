<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AdditionalSettings
{
    public function __construct(
        /** Predefined reasons for flagging content */
        public ?array $Reasons = null,
        /** Whether a comment is required from the reporter */
        public ?bool $ReporterCommentRequired = null,
        /** Whether a comment is required from the reviewer */
        public ?bool $ReviewerCommentRequired = null,
        /** Whether to hide flagged content from general view */
        public ?bool $HideFlaggedContent = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): AdditionalSettings {
        $object = new self(
            Reasons: isset($data['Reasons']) ? $data['Reasons'] : null,
            ReporterCommentRequired: isset($data['ReporterCommentRequired']) ? $data['ReporterCommentRequired'] : null,
            ReviewerCommentRequired: isset($data['ReviewerCommentRequired']) ? $data['ReviewerCommentRequired'] : null,
            HideFlaggedContent: isset($data['HideFlaggedContent']) ? $data['HideFlaggedContent'] : null,
        );
        return $object;
    }
}
