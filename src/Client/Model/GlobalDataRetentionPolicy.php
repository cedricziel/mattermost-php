<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class GlobalDataRetentionPolicy
{
    /** Indicates whether data retention policy deletion of messages is enabled globally. */
    public ?bool $message_deletion_enabled;

    /** Indicates whether data retention policy deletion of file attachments is enabled globally. */
    public ?bool $file_deletion_enabled;

    /** The current server timestamp before which messages should be deleted. */
    public ?int $message_retention_cutoff;

    /** The current server timestamp before which files should be deleted. */
    public ?int $file_retention_cutoff;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        $this->message_deletion_enabled = $data['message_deletion_enabled'];
        $this->file_deletion_enabled = $data['file_deletion_enabled'];
        $this->message_retention_cutoff = $data['message_retention_cutoff'];
        $this->file_retention_cutoff = $data['file_retention_cutoff'];
        return $this;
    }
}
