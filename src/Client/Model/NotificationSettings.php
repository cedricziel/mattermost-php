<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class NotificationSettings
{
    public function __construct(
        public $EventTargetMapping = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): NotificationSettings {
        $object = new self(
            EventTargetMapping: isset($data['EventTargetMapping']) ? $data['EventTargetMapping'] : null,
        );
        return $object;
    }
}
