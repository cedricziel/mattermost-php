<?php

namespace Response;

use App\Mattermost\Form\Form;
use Symfony\Component\Serializer\Attribute\SerializedName;

abstract class CallResponse
{
    const TYPE_OK = 'ok';
    const TYPE_FORM = 'form';
    const TYPE_NAVIGATE = 'navigate';
    const TYPE_ERROR = 'error';

    public function __construct(
        #[SerializedName('type')]
        protected readonly string $type,
        #[SerializedName('text')]
        protected readonly ?string $text = null,
        #[SerializedName('data')]
        protected readonly ?array $data = null,
        #[SerializedName('navigate_to_url')]
        protected readonly ?string $navigateToUrl = null,
        #[SerializedName('use_external_browser')]
        protected readonly ?bool $useExternalBrowser = false,
        #[SerializedName('form')]
        protected readonly ?Form $form = null,
        #[SerializedName('refresh_bindings')]
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
}
