<?php

namespace CedricZiel\MattermostPhp\Common\Attachments\Actions;

use CedricZiel\MattermostPhp\Common\Attachments\Action;

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

    public static function create(string $id, string $name, ActionIntegration $integration): self
    {
        return new self($id, $name, $integration);
    }

    public function jsonSerialize(): \stdClass
    {
        $o = parent::jsonSerialize();

        $o->type = $this->type;
        if (is_array($this->options) && count($this->options) > 0) {
            $o->options = array_map(function (SelectOption $option) {
                return $option->jsonSerialize();
            }, $this->options);
        }

        return $o;
    }

    public function addOption(string $text, string $value): static
    {
        $this->options[] = new SelectOption($text, $value);

        return $this;
    }
}
