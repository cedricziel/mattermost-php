<?php

namespace CedricZiel\MattermostPhp\Common\Attachments;

use CedricZiel\MattermostPhp\Common\Attachments\Actions\ActionIntegration;

class Action implements \JsonSerializable
{
    public function __construct(
        protected string $id,
        protected string $name,
        protected ActionIntegration $integration,
    ) {
    }

    public static function create(string $id, string $name, ActionIntegration $integration): self
    {
        return new self($id, $name, $integration);
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
