<?php

namespace CedricZiel\MattermostPhp\Apps\Bindings;

use CedricZiel\MattermostPhp\Apps\Call;
use CedricZiel\MattermostPhp\Apps\Forms\Form;

final class LocationBinding implements \JsonSerializable
{
    public function __construct(
        /**
         * Location allows the App to identify where in the UX the Call request
         * comes from. It is optional. For /command bindings, Location is
         * defaulted to Label.
         */
        protected readonly string $location,
        protected readonly string $icon = '',
        protected readonly string $hint = '',
        protected readonly string $description = '',
        /**
         * @var LocationBinding[]|null
         */
        protected readonly ?array $bindings = null,
        protected readonly ?Form $form = null,
        protected readonly ?string $label = null,
        protected readonly ?Call $submit = null,
    ) {
    }

    public static function create(string $location, string $icon = '', string $hint = '', $description = ''): self
    {
        return new self($location, $icon, $hint, $description);
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getHint(): string
    {
        return $this->hint;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return LocationBinding[]|null
     */
    public function getBindings(): ?array
    {
        return $this->bindings;
    }

    public function getForm(): ?Form
    {
        return $this->form;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getSubmit(): ?Call
    {
        return $this->submit;
    }

    public function jsonSerialize(): mixed
    {
        $o = new \stdClass();

        $o->location = $this->location;
        $o->icon = $this->icon;
        $o->hint = $this->hint;
        $o->description = $this->description;

        if ($this->bindings !== null) {
            $o->bindings = array_map(fn(LocationBinding $binding) => $binding->jsonSerialize(), $this->bindings);
        }

        if ($this->form !== null) {
            $o->form = $this->form;
        }

        if ($this->label !== null) {
            $o->label = $this->label;
        }

        if ($this->submit !== null) {
            $o->submit = $this->submit;
        }

        return $o;
    }
}
