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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): EventTargetMapping {
        $object = new self(
            assigned: isset($data['assigned']) ? $data['assigned'] : null,
            dismissed: isset($data['dismissed']) ? $data['dismissed'] : null,
            flagged: isset($data['flagged']) ? $data['flagged'] : null,
            removed: isset($data['removed']) ? $data['removed'] : null,
        );
        return $object;
    }
}
