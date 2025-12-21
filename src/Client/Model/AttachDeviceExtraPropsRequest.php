<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AttachDeviceExtraPropsRequest
{
    public function __construct(
        /** Mobile device id. For Android prefix the id with `android:` and Apple with `apple:` */
        public ?string $device_id = null,
        /** Whether the mobile device has notifications disabled. Accepted values are "true" or "false". */
        public ?string $deviceNotificationDisabled = null,
        /** Mobile app version. The version must be parseable as a semver. */
        public ?string $mobileVersion = null,
    ) {
    }
}
