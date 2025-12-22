<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class NotificationSettings
{
    public function __construct(
        public $EventTargetMapping = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return NotificationSettings The hydrated instance
     */
    public static function hydrate(?array $data): NotificationSettings
    {
        $data ??= [];

        return new self(
            EventTargetMapping: $data['EventTargetMapping'] ?? null,
        );
    }
}
