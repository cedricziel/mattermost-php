<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateUserStatusRequest
{
    public function __construct(
        /** User ID */
        public ?string $user_id = null,
        /** User status, can be `online`, `away`, `offline` and `dnd` */
        public ?string $status = null,
        /** Time in epoch seconds at which a dnd status would be unset. */
        public ?int $dnd_end_time = null,
    ) {
    }
}
