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
        array $data,
    ): static
    {
        $this->AndroidLatestVersion = $data['AndroidLatestVersion'];
        $this->AndroidMinVersion = $data['AndroidMinVersion'];
        $this->DesktopLatestVersion = $data['DesktopLatestVersion'];
        $this->DesktopMinVersion = $data['DesktopMinVersion'];
        $this->IosLatestVersion = $data['IosLatestVersion'];
        $this->IosMinVersion = $data['IosMinVersion'];
        $this->database_status = $data['database_status'];
        $this->filestore_status = $data['filestore_status'];
        $this->status = $data['status'];
        $this->CanReceiveNotifications = $data['CanReceiveNotifications'];
        return $this;
    }
}
