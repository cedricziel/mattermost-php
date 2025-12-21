<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ReoderChecklistItemRequest
{
    public function __construct(
        /** Zero-based index of the item to reorder. */
        public int $item_num,
        /** Zero-based index of the new place to move the item to. */
        public int $new_location,
    ) {
    }
}
