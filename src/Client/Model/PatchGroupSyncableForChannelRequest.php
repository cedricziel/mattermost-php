<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchGroupSyncableForChannelRequest
{
    public function __construct(
        public ?bool $auto_add = null,
    ) {
    }
}
