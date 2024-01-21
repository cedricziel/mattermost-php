<?php

namespace CedricZiel\MattermostPhp\Apps\Response;

use CedricZiel\MattermostPhp\Apps\Forms\Form;

abstract class CallResponse implements \JsonSerializable
{
    const TYPE_OK = 'ok';
    const TYPE_FORM = 'form';
    const TYPE_NAVIGATE = 'navigate';
    const TYPE_ERROR = 'error';

    public function __construct(
        protected readonly string $type,
        protected readonly ?string $text = null,
        protected readonly ?array $data = null,
        protected readonly ?string $navigateToUrl = null,
        protected readonly ?bool $useExternalBrowser = null,
        protected readonly ?Form $form = null,
        protected readonly ?bool $refreshBindings = null,
    ) {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getNavigateToUrl(): ?string
    {
        return $this->navigateToUrl;
    }

    public function getUseExternalBrowser(): ?bool
    {
        return $this->useExternalBrowser;
    }

    public function getForm(): ?Form
    {
        return $this->form;
    }

    public function getRefreshBindings(): ?bool
    {
        return $this->refreshBindings;
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();

        $o->type = $this->type;

        if ($this->text !== null) {
            $o->text = $this->text;
        }

        if ($this->data !== null) {
            $o->data = $this->data;
        }

        if ($this->navigateToUrl !== null) {
            $o->navigate_to_url = $this->navigateToUrl;
        }

        if ($this->useExternalBrowser !== null) {
            $o->use_external_browser = $this->useExternalBrowser;
        }

        if ($this->form !== null) {
            $o->form = $this->form;
        }

        if ($this->refreshBindings !== null) {
            $o->refresh_bindings = $this->refreshBindings;
        }

        return $o;
    }
}
