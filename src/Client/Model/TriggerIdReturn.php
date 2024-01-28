<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TriggerIdReturn
{
    /** The trigger_id returned by the slash command. */
    public ?string $trigger_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->trigger_id = $data['trigger_id'];
        return $this;
    }
}
