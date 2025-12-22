<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TriggerIdReturn
{
    public function __construct(
        /** The trigger_id returned by the slash command. */
        public ?string $trigger_id = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return TriggerIdReturn The hydrated instance
     */
    public static function hydrate(?array $data): TriggerIdReturn
    {
        $data ??= [];

        return new self(
            trigger_id: $data['trigger_id'] ?? null,
        );
    }
}
