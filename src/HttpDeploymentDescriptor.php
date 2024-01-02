<?php

namespace CedricZiel\MattermostPhp;

class HttpDeploymentDescriptor
{
    public function __construct(
        public readonly string $root_url,
    ) {
    }
}
