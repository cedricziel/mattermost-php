<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class EventTargetMapping
{
    public function __construct(
        /** List of targets to notify when content is assigned */
        public ?array $assigned = null,
        /** List of targets to notify when content is dismissed */
        public ?array $dismissed = null,
        /** List of targets to notify when content is flagged */
        public ?array $flagged = null,
        /** List of targets to notify when content is removed */
        public ?array $removed = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return EventTargetMapping The hydrated instance
     */
    public static function hydrate(?array $data): EventTargetMapping
    {
        $data ??= [];

        return new self(
            assigned: $data['assigned'] ?? null,
            dismissed: $data['dismissed'] ?? null,
            flagged: $data['flagged'] ?? null,
            removed: $data['removed'] ?? null,
        );
    }
}
