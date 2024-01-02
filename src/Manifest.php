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
        protected readonly ?string $description = null,
        #[SerializedName('version')]
        protected readonly ?string $version = null,
        #[SerializedName('bindings')]
        protected readonly ?Call   $bindings = null,
        #[SerializedName('on_install')]
        protected readonly ?Call   $onInstall = null,
        #[SerializedName('on_uninstall')]
        protected readonly ?Call   $onUnInstall = null,
        #[SerializedName('on_version_changed')]
        protected readonly ?Call   $onVersionChanged = null,
        #[SerializedName('requested_locations')]
        protected readonly ?array  $requestedLocations = null,
        #[SerializedName('requested_permissions')]
        protected readonly ?array  $requestedPermissions = null,
        #[SerializedName('http')]
        protected readonly ?HttpDeploymentDescriptor $http = null,
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function getHomepageUrl(): ?string
    {
        return $this->homepageUrl;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function getBindings(): ?Call
    {
        return $this->bindings;
    }

    public function getOnInstall(): ?Call
    {
        return $this->onInstall;
    }

    public function getOnUnInstall(): ?Call
    {
        return $this->onUnInstall;
    }

    public function getOnVersionChanged(): ?Call
    {
        return $this->onVersionChanged;
    }

    public function getRequestedLocations(): ?array
    {
        return $this->requestedLocations;
    }

    public function getRequestedPermissions(): ?array
    {
        return $this->requestedPermissions;
    }

    public function getHttp(): ?HttpDeploymentDescriptor
    {
        return $this->http;
    }
}
