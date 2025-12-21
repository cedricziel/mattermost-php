<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ReorderPlaybookPropertyFieldsRequest
{
    public function __construct(
        /** ID of the property field to move. */
        public string $field_id,
        /** Target position index (zero-based) where the field should be moved. */
        public int $target_position,
    ) {
    }
}
