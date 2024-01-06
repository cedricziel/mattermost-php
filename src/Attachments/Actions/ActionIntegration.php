<?php

namespace CedricZiel\MattermostPhp\Attachments\Actions;

class ActionIntegration implements \JsonSerializable
{
    public function __construct(
        protected string $url,
        protected ?\stdClass $context = null,
    ) {
    }

    public static function create(string $url): self
    {
        return new self($url, null);
    }

    public function withContext(string $option, string $value): self
    {
        if ($this->context === null) {
            $this->context = new \stdClass();
        }

        $this->context->{$option} = $value;

        return $this;
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();
        if ($this->url !== null) {
            $o->url = $this->url;
        }
        if ($this->context !== null) {
            $o->context = $this->context;
        }
        return $o;
    }
}
