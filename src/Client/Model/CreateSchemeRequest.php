<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateSchemeRequest
{
    public function __construct(
        /** The name of the scheme */
        public string $name,
        /** The scope of the scheme ("team" or "channel") */
        public string $scope,
        /** The description of the scheme */
        public ?string $description = null,
    ) {
    }
}
