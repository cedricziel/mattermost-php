<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ItemSetAssigneeRequest
{
    public function __construct(
        /** The user ID of the new assignee of the item. */
        public string $assignee_id,
    ) {
    }
}
