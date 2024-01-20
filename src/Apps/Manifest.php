<?php

namespace CedricZiel\MattermostPhp\Apps;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Manifest implements \JsonSerializable
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

    public function jsonSerialize(): \stdClass
    {
        $o = new \stdClass();

        if ($this->id !== null) {
            $o->app_id = $this->id;
        }
        if ($this->displayName !== null) {
            $o->display_name = $this->displayName;
        }
        if ($this->homepageUrl !== null) {
            $o->homepage_url = $this->homepageUrl;
        }
        if ($this->description !== null) {
            $o->description = $this->description;
        }
        if ($this->version !== null) {
            $o->version = $this->version;
        }
        if ($this->bindings !== null) {
            $o->bindings = $this->bindings->jsonSerialize();
        }
        if ($this->onInstall !== null) {
            $o->on_install = $this->onInstall->jsonSerialize();
        }
        if ($this->onUnInstall !== null) {
            $o->on_uninstall = $this->onUnInstall->jsonSerialize();
        }
        if ($this->onVersionChanged !== null) {
            $o->on_version_changed = $this->onVersionChanged->jsonSerialize();
        }
        if ($this->requestedLocations !== null) {
            $o->requested_locations = $this->requestedLocations;
        }
        if ($this->requestedPermissions !== null) {
            $o->requested_permissions = $this->requestedPermissions;
        }
        if ($this->http !== null) {
            $o->http = $this->http->jsonSerialize();
        }

        return $o;
    }
}
