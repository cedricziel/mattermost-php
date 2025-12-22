<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GlobalDataRetentionPolicy
{
    public function __construct(
        /** Indicates whether data retention policy deletion of messages is enabled globally. */
        public ?bool $message_deletion_enabled = null,
        /** Indicates whether data retention policy deletion of file attachments is enabled globally. */
        public ?bool $file_deletion_enabled = null,
        /** The current server timestamp before which messages should be deleted. */
        public ?int $message_retention_cutoff = null,
        /** The current server timestamp before which files should be deleted. */
        public ?int $file_retention_cutoff = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return GlobalDataRetentionPolicy The hydrated instance
     */
    public static function hydrate(?array $data): GlobalDataRetentionPolicy
    {
        $data ??= [];

        return new self(
            message_deletion_enabled: $data['message_deletion_enabled'] ?? null,
            file_deletion_enabled: $data['file_deletion_enabled'] ?? null,
            message_retention_cutoff: $data['message_retention_cutoff'] ?? null,
            file_retention_cutoff: $data['file_retention_cutoff'] ?? null,
        );
    }
}
