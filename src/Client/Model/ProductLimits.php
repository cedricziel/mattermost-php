<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ProductLimits
{
    public function __construct(
        public $boards = null,
        public $files = null,
        public $integrations = null,
        public $messages = null,
        public $teams = null,
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var  $data['boards'] */
            if (isset($data['boards'])) $this->boards = $data['boards'];
        /** @var  $data['files'] */
            if (isset($data['files'])) $this->files = $data['files'];
        /** @var  $data['integrations'] */
            if (isset($data['integrations'])) $this->integrations = $data['integrations'];
        /** @var  $data['messages'] */
            if (isset($data['messages'])) $this->messages = $data['messages'];
        /** @var  $data['teams'] */
            if (isset($data['teams'])) $this->teams = $data['teams'];
        return $this;
    }
}
