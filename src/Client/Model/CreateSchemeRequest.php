<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateSchemeRequest
{
    public function __construct(
        /** The display name of the scheme */
        public string $display_name,
        /** The scope of the scheme ("team" or "channel") */
        public string $scope,
        /** The name of the scheme */
        public ?string $name = null,
        /** The description of the scheme */
        public ?string $description = null,
    ) {
    }
}
