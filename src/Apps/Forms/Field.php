<?php

namespace CedricZiel\MattermostPhp\Apps\Forms;

use CedricZiel\MattermostPhp\Apps\Call;

class Field implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public FieldType $type,
        public ?bool $isRequired = null,
        public ?bool $isReadonly = null,
        public mixed $value = null,
        public ?string $description = null,
        public ?string $label = null,
        public ?string $hint = null,
        public ?int $position = null,
        public ?string $modalLabel = null,
        public ?bool $isMultiselect = null,
        public ?bool $isRefresh = false,
        /**
         * @var array<SelectOption>
         */
        public ?array $options = null,
        public ?Call $lookup = null,
        public readonly ?TextFieldSubtype $subtype = null,
        public ?int $minLength = null,
        public ?int $maxLength = null,
    ) {
    }

    public static function create(string $name, FieldType $type): self
    {
        return new self($name, $type);
    }

    public static function createText(string $name, TextFieldSubtype $subType = TextFieldSubtype::INPUT): self
    {
        return new self($name, FieldType::TEXT, subtype: $subType);
    }

    public static function createStaticSelect(string $name): self {
        return new self($name, FieldType::STATIC_SELECT);
    }

    public static function createDynamicSelect(string $name, Call $lookup): self {
        return new self($name, FieldType::DYNAMIC_SELECT, lookup: $lookup);
    }

    public static function createBool(string $name): self {
        return new self($name, FieldType::BOOL);
    }

    public static function createUserSelect(string $name): self {
        return new self($name, FieldType::USER_SELECT);
    }

    public static function createChannelSelect(string $name): self {
        return new self($name, FieldType::CHANNEL_SELECT);
    }

    public static function createMarkdown(string $name, string $markdown): self {
        return (new self($name, FieldType::MARKDOWN))->withValue($markdown);
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();

        $o->name = $this->name;
        $o->type = $this->type->value;

        if ($this->isRequired !== null) {
            $o->is_required = $this->isRequired;
        }
        if ($this->isReadonly !== null) {
            $o->readonly = $this->isReadonly;
        }
        if ($this->value !== null) {
            $o->value = $this->value;
        }
        if ($this->description !== null) {
            $o->description = $this->description;
        }
        if ($this->label !== null) {
            $o->label = $this->label;
        }
        if ($this->hint !== null) {
            $o->hint = $this->hint;
        }
        if ($this->position !== null) {
            $o->position = $this->position;
        }
        if ($this->modalLabel !== null) {
            $o->modal_label = $this->modalLabel;
        }
        if ($this->isMultiselect !== null) {
            $o->multiselect = $this->isMultiselect;
        }
        if ($this->isRefresh !== null) {
            $o->refresh = $this->isRefresh;
        }

        if ($this->options !== null && count($this->options) > 0) {
            $o->options = array_map(function (SelectOption $option) {
                return $option->jsonSerialize();
            }, $this->options);
        }

        if ($this->lookup !== null) {
            $o->lookup = $this->lookup->jsonSerialize();
        }

        $o->subtype = $this->subtype;
        $o->min_length = $this->minLength;
        $o->max_length = $this->maxLength;

        return $o;
    }

    private function withValue(mixed $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function setRequired(bool $required = true): self
    {
        $this->isRequired = $required;

        return $this;
    }

    public function setReadonly(bool $readonly = true): self
    {
        $this->isReadonly = $readonly;

        return $this;
    }

    public function withDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function withLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function withHint(string $hint): self
    {
        $this->hint = $hint;

        return $this;
    }

    /**
     * The index of the positional argument. A value greater than zero indicates the position this field is in.
     * A value of -1 indicates the last argument.
     */
    public function withPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function withModalLabel(string $modalLabel): self
    {
        $this->modalLabel = $modalLabel;

        return $this;
    }

    public function setMultiselect(bool $multiselect = true): self
    {
        $this->isMultiselect = $multiselect;

        return $this;
    }

    /**
     * Allows the form to be refreshed when the value of the field has changed.
     */
    public function setRefresh(bool $refresh = true): self
    {
        $this->isRefresh = $refresh;

        return $this;
    }

    public function addOption(SelectOption $option): self
    {
        if (null === $this->options) {
            $this->options = [];
        }

        $this->options[] = $option;

        return $this;
    }

    /**
     * A call that returns a list of options for dynamic select fields.
     */
    public function withLookup(Call $lookup): self
    {
        $this->lookup = $lookup;

        return $this;
    }

    public function withMinLength(int $minLength): self
    {
        $this->minLength = $minLength;

        return $this;
    }

    public function withMaxLength(int $maxLength): self
    {
        $this->maxLength = $maxLength;

        return $this;
    }
}
