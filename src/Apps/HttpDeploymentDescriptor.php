<?php

namespace CedricZiel\MattermostPhp\Apps;

class HttpDeploymentDescriptor implements \JsonSerializable
{
    public function __construct(
        protected string $root_url,
    ) {
    }

    public static function create(string $root): HttpDeploymentDescriptor
    {
        return new self($root);
    }

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();

        if ($this->root_url !== null) {
            $o->root_url = $this->root_url;
        }

        return $o;
    }

    public function getRootUrl(): string
    {
        return $this->root_url;
    }
}
