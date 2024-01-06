<?php

namespace CedricZiel\MattermostPhp\SlashCommands;

class SelectAction extends Action
{
    protected string $type = 'select';
    public function __construct(
        string $id,
        string $name,
        ActionIntegration $integration,
        protected array $options = []
    ) {
        parent::__construct($id, $name, $integration);
    }

    public function jsonSerialize(): \stdClass
    {
        $o = parent::jsonSerialize();

        $o->type = $this->type;
        if ($this->options !== null) {
            $o->options = $this->options;
        }

        return $o;
    }
}
