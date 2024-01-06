<?php

namespace CedricZiel\MattermostPhp\Attachments\Actions;

class SelectOption
{
    public function __construct(
        protected string $text,
        protected string $value,
    ) {
    }

    public function create(string $label, string $value): static
    {
        return new static($label, $value);
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();
        if ($this->text !== null) {
            $o->text = $this->text;
        }
        if ($this->value !== null) {
            $o->value = $this->value;
        }
        return $o;
    }
}
