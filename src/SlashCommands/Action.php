<?php

namespace CedricZiel\MattermostPhp\SlashCommands;

class Action implements \JsonSerializable
{
    public function __construct(
        protected string $id,
        protected string $name,
        protected ActionIntegration $integration,
    ) {
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();
        if ($this->id !== null) {
            $o->id = $this->id;
        }
        if ($this->name !== null) {
            $o->name = $this->name;
        }
        if ($this->integration !== null) {
            $o->integration = $this->integration;
        }
        return $o;
    }
}
