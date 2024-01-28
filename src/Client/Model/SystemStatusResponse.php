<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SystemStatusResponse
{
    /** Latest Android version supported */
    public ?string $AndroidLatestVersion;

    /** Minimum Android version supported */
    public ?string $AndroidMinVersion;

    /** Latest desktop version supported */
    public ?string $DesktopLatestVersion;

    /** Minimum desktop version supported */
    public ?string $DesktopMinVersion;

    /** Latest iOS version supported */
    public ?string $IosLatestVersion;

    /** Minimum iOS version supported */
    public ?string $IosMinVersion;

    /** Status of database ("OK" or "UNHEALTHY"). Included when get_server_status parameter set. */
    public ?string $database_status;

    /** Status of filestore ("OK" or "UNHEALTHY"). Included when get_server_status parameter set. */
    public ?string $filestore_status;

    /** Status of server ("OK" or "UNHEALTHY"). Included when get_server_status parameter set. */
    public ?string $status;

    /** Whether the device id provided can receive notifications ("true", "false" or "unknown"). Included when device_id parameter set. */
    public ?string $CanReceiveNotifications;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['AndroidLatestVersion'] */
        if (isset($data['AndroidLatestVersion'])) $this->AndroidLatestVersion = $data['AndroidLatestVersion'];
        /** @var string $data['AndroidMinVersion'] */
        if (isset($data['AndroidMinVersion'])) $this->AndroidMinVersion = $data['AndroidMinVersion'];
        /** @var string $data['DesktopLatestVersion'] */
        if (isset($data['DesktopLatestVersion'])) $this->DesktopLatestVersion = $data['DesktopLatestVersion'];
        /** @var string $data['DesktopMinVersion'] */
        if (isset($data['DesktopMinVersion'])) $this->DesktopMinVersion = $data['DesktopMinVersion'];
        /** @var string $data['IosLatestVersion'] */
        if (isset($data['IosLatestVersion'])) $this->IosLatestVersion = $data['IosLatestVersion'];
        /** @var string $data['IosMinVersion'] */
        if (isset($data['IosMinVersion'])) $this->IosMinVersion = $data['IosMinVersion'];
        /** @var string $data['database_status'] */
        if (isset($data['database_status'])) $this->database_status = $data['database_status'];
        /** @var string $data['filestore_status'] */
        if (isset($data['filestore_status'])) $this->filestore_status = $data['filestore_status'];
        /** @var string $data['status'] */
        if (isset($data['status'])) $this->status = $data['status'];
        /** @var string $data['CanReceiveNotifications'] */
        if (isset($data['CanReceiveNotifications'])) $this->CanReceiveNotifications = $data['CanReceiveNotifications'];
        return $this;
    }
}
