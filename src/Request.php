<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Request
{
    public function __construct(
        #[SerializedName('path')]
        protected readonly string $path,
        #[SerializedName('context')]
        protected readonly Context $context,
        #[SerializedName('expand')]
        protected readonly ?Expand $expand = null,
        #[SerializedName('state')]
        protected readonly ?array $state = null,
        #[SerializedName('values')]
        protected readonly ?array $values = null,
        #[SerializedName('raw_command')]
        protected readonly ?string $raw_command = null,
        #[SerializedName('selected_field')]
        protected readonly ?string $selected_field = null,
        #[SerializedName('query')]
        protected readonly ?string $query = null,
    ) {}

    public function getPath(): string
    {
        return $this->path;
    }

    public function getExpand(): ?Expand
    {
        return $this->expand;
    }

    public function getState(): ?array
    {
        return $this->state;
    }

    public function getValues(): ?array
    {
        return $this->values;
    }

    public function getContext(): Context
    {
        return $this->context;
    }

    public function getRawCommand(): ?string
    {
        return $this->raw_command;
    }

    public function getSelectedField(): ?string
    {
        return $this->selected_field;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }
}
