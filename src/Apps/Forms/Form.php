<?php

namespace CedricZiel\MattermostPhp\Apps\Forms;

use CedricZiel\MattermostPhp\Apps\Call;

class Form implements \JsonSerializable
{
    public function __construct(
        protected readonly string $title,
        protected readonly Call $submit,
        protected ?Call $source = null,
        protected ?array $fields = null,
        protected ?string $header = null,
        protected ?string $footer = null,
        protected ?string $submitButtons = null,
    ) {}

    public static function create(string $title, Call $submit): self
    {
        return new self(
            $title,
            $submit
        );
    }

    public function withSource(Call $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function addField(Field $field): self
    {
        $this->fields[] = $field;

        return $this;
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();

        $o->title = $this->title;
        $o->submit = $this->submit->jsonSerialize();

        if (is_array($this->fields) && count($this->fields) > 0) {
            $o->fields = array_map(function (Field $field) {
                return $field->jsonSerialize();
            }, $this->fields);
        }

        if ($this->source !== null) {
            $o->source = $this->source->jsonSerialize();
        }

        if ($this->header !== null) {
            $o->header = $this->header;
        }

        if ($this->footer !== null) {
            $o->footer = $this->footer;
        }

        if ($this->submitButtons !== null) {
            $o->submit_buttons = $this->submitButtons;
        }

        return $o;
    }

    public function validate(): void
    {
        if (empty($this->title)) {
            throw new \InvalidArgumentException('Form title must not be empty');
        }

        if (empty($this->submit)) {
            throw new \InvalidArgumentException('Form submit must not be empty');
        }

        if ($this->fields === null && $this->source === null) {
            throw new \InvalidArgumentException('At least one of fields or source must be defined.');
        }
    }
}
