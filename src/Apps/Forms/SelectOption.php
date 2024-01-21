<?php

namespace CedricZiel\MattermostPhp\Apps\Forms;

class SelectOption implements \JsonSerializable
{
    public function __construct(
        public readonly string $label,
        public readonly string $value,
        public ?string $iconData = null,
    ) {
    }

    public static function create(string $label, mixed $value, ?string $iconData = null): SelectOption
    {
        return new self($label, $value, $iconData);
    }

    public function withIconData(string $iconData): self
    {
        $this->iconData = $iconData;

        return $this;
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();

        $o->value = $this->value;
        $o->label = $this->label;

        if ($this->iconData !== null) {
            $o->icon_data = $this->iconData;
        }

        return $o;
    }
}
