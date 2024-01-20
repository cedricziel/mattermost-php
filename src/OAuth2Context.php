<?php

namespace CedricZiel\MattermostPhp;

class OAuth2Context implements \JsonSerializable
{
    public function __construct(
        protected ?string $connect_url = null,
        protected ?string $complete_url = null,
    ) {}

    public function getConnectUrl(): ?string
    {
        return $this->connect_url;
    }

    public function getCompleteUrl(): ?string
    {
        return $this->complete_url;
    }

    public function jsonSerialize(): mixed
    {
        $o = new \stdClass();
        if ($this->connect_url !== null) {
            $o->connect_url = $this->connect_url;
        }
        if ($this->complete_url !== null) {
            $o->complete_url = $this->complete_url;
        }
        return $o;
    }
}
