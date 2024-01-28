<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TriggerIdReturn
{
    /** The trigger_id returned by the slash command. */
    public ?string $trigger_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['trigger_id'] */
        if (isset($data['trigger_id'])) $this->trigger_id = $data['trigger_id'];
        return $this;
    }
}
