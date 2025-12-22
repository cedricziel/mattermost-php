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

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return AdditionalSettings The hydrated instance
     */
    public static function hydrate(?array $data): AdditionalSettings
    {
        $data ??= [];

        return new self(
            Reasons: $data['Reasons'] ?? null,
            ReporterCommentRequired: $data['ReporterCommentRequired'] ?? null,
            ReviewerCommentRequired: $data['ReviewerCommentRequired'] ?? null,
            HideFlaggedContent: $data['HideFlaggedContent'] ?? null,
        );
    }
}
