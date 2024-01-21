<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class TestSiteURLRequest
{
    public function __construct(
        /** The Site URL to test */
        public ?string $site_url = null,
    ) {
    }
}
