<?php

namespace CedricZiel\MattermostPhp\Apps;

use CedricZiel\MattermostPhp\Expand;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Call implements \JsonSerializable
{
    public function __construct(
        #[SerializedName('path')]
        protected readonly string $path,
        #[SerializedName('state')]
        protected ?array $state = null,
        #[SerializedName('expand')]
        protected ?Expand $expand = null,
    ) {
    }

    public static function create(string $path) : self
    {
        return new self($path);
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getState(): ?array
    {
        return $this->state;
    }

    public function getExpand(): ?Expand
    {
        return $this->expand;
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();

        if ($this->path !== null) {
            $o->path = $this->path;
        }
        if (is_array($this->state) && count($this->state) > 0) {
            $o->state = $this->state;
        }
        if ($this->expand !== null) {
            $o->expand = $this->expand->jsonSerialize();
        }

        return $o;
    }

    public function withState(array $array): static
    {
        $this->state = $array;

        return $this;
    }

    public function withExpand(Expand $expand): static
    {
        $this->expand = $expand;

        return $this;
    }
}
