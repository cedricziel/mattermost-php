<?php

namespace CedricZiel\MattermostPhp\SlashCommands;

class ActionIntegration implements \JsonSerializable
{
    public function __construct(
        protected string $url,
        protected ?\stdClass $context = null,
    ) {
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();
        if ($this->url !== null) {
            $o->url = $this->url;
        }
        if ($this->context !== null) {
            $o->context = $this->context;
        }
        return $o;
    }
}
