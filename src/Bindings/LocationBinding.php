<?php

namespace CedricZiel\MattermostPhp\Bindings;

use CedricZiel\MattermostPhp\Call;
use CedricZiel\MattermostPhp\Form\Form;
use Symfony\Component\Serializer\Attribute\SerializedName;

final class LocationBinding
{
    public function __construct(
        /**
         * Location allows the App to identify where in the UX the Call request
         * comes from. It is optional. For /command bindings, Location is
         * defaulted to Label.
         */
        #[SerializedName('location')]
        protected readonly string $location,
        protected readonly string $icon = '',
        protected readonly string $hint = '',
        protected readonly string $description = '',
        /**
         * @var LocationBinding[]|null
         */
        #[SerializedName('bindings')]
        protected readonly ?array $bindings = null,
        #[SerializedName('form')]
        protected readonly ?Form $form = null,
        protected readonly ?string $label = null,
        protected readonly ?Call $submit = null,
    ) {
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
}
