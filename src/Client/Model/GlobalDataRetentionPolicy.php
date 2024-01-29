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

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var bool $data['message_deletion_enabled'] */
            if (isset($data['message_deletion_enabled'])) $this->message_deletion_enabled = $data['message_deletion_enabled'];
        /** @var bool $data['file_deletion_enabled'] */
            if (isset($data['file_deletion_enabled'])) $this->file_deletion_enabled = $data['file_deletion_enabled'];
        /** @var int $data['message_retention_cutoff'] */
            if (isset($data['message_retention_cutoff'])) $this->message_retention_cutoff = $data['message_retention_cutoff'];
        /** @var int $data['file_retention_cutoff'] */
            if (isset($data['file_retention_cutoff'])) $this->file_retention_cutoff = $data['file_retention_cutoff'];
        return $this;
    }
}
