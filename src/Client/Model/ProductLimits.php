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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): ProductLimits {
        $object = new self(
            boards: isset($data['boards']) ? $data['boards'] : null,
            files: isset($data['files']) ? $data['files'] : null,
            integrations: isset($data['integrations']) ? $data['integrations'] : null,
            messages: isset($data['messages']) ? $data['messages'] : null,
            teams: isset($data['teams']) ? $data['teams'] : null,
        );
        return $object;
    }
}
