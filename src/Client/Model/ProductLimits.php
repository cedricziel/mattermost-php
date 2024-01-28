<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ProductLimits
{
    public $boards;
    public $files;
    public $integrations;
    public $messages;
    public $teams;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->boards = $data['boards'];
        $this->files = $data['files'];
        $this->integrations = $data['integrations'];
        $this->messages = $data['messages'];
        $this->teams = $data['teams'];
        return $this;
    }
}
