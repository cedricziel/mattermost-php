<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TriggerIdReturn
{
    public function __construct(
        /** The trigger_id returned by the slash command. */
        public ?string $trigger_id = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            trigger_id: isset($data['trigger_id']) ? $data['trigger_id'] : null,
        );
        return $object;
    }
}
