<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SystemStatusResponse
{
    public function __construct(
        /** Latest Android version supported */
        public ?string $AndroidLatestVersion = null,
        /** Minimum Android version supported */
        public ?string $AndroidMinVersion = null,
        /** Latest desktop version supported */
        public ?string $DesktopLatestVersion = null,
        /** Minimum desktop version supported */
        public ?string $DesktopMinVersion = null,
        /** Latest iOS version supported */
        public ?string $IosLatestVersion = null,
        /** Minimum iOS version supported */
        public ?string $IosMinVersion = null,
        /** Status of database ("OK" or "UNHEALTHY"). Included when get_server_status parameter set. */
        public ?string $database_status = null,
        /** Status of filestore ("OK" or "UNHEALTHY"). Included when get_server_status parameter set. */
        public ?string $filestore_status = null,
        /** Status of server ("OK" or "UNHEALTHY"). Included when get_server_status parameter set. */
        public ?string $status = null,
        /** Whether the device id provided can receive notifications ("true", "false" or "unknown"). Included when device_id parameter set. */
        public ?string $CanReceiveNotifications = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            AndroidLatestVersion: $data['AndroidLatestVersion'] ?? null,
            AndroidMinVersion: $data['AndroidMinVersion'] ?? null,
            DesktopLatestVersion: $data['DesktopLatestVersion'] ?? null,
            DesktopMinVersion: $data['DesktopMinVersion'] ?? null,
            IosLatestVersion: $data['IosLatestVersion'] ?? null,
            IosMinVersion: $data['IosMinVersion'] ?? null,
            database_status: $data['database_status'] ?? null,
            filestore_status: $data['filestore_status'] ?? null,
            status: $data['status'] ?? null,
            CanReceiveNotifications: $data['CanReceiveNotifications'] ?? null,
        );
        return $object;
    }
}
