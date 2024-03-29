<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class InstallMarketplacePluginRequest
{
    public function __construct(
        /** The ID of the plugin to install. */
        public string $id,
        /** The version of the plugin to install. */
        public string $version,
    ) {
    }
}
