<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Manifest
{
    public function __construct(
        #[SerializedName('app_id')]
        public readonly string $id,
        #[SerializedName('display_name')]
        public readonly string $displayName,
        #[SerializedName('homepage_url')]
        public readonly string $homepageUrl,
        #[SerializedName('description')]
        public readonly ?string $description = null,
        #[SerializedName('version')]
        public readonly ?string $version = null,
        #[SerializedName('bindings')]
        public readonly ?Call   $bindings = null,
        #[SerializedName('on_install')]
        public readonly ?Call   $onInstall = null,
        #[SerializedName('on_uninstall')]
        public readonly ?Call   $onUnInstall = null,
        #[SerializedName('on_version_changed')]
        public readonly ?Call   $onVersionChanged = null,
        #[SerializedName('requested_locations')]
        public readonly ?array  $requestedLocations = null,
        #[SerializedName('requested_permissions')]
        public readonly ?array  $requestedPermissions = null,
        #[SerializedName('http')]
        public readonly ?HttpDeploymentDescriptor $http = null,
    ) {
    }
}
