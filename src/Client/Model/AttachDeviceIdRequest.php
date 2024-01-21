<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AttachDeviceIdRequest
{
    public function __construct(
        /** Mobile device id. For Android prefix the id with `android:` and Apple with `apple:` */
        public ?string $device_id = null,
    ) {
    }
}
