<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class PatchGroupSyncableForTeamRequest
{
    public function __construct(
        public ?bool $auto_add = null,
    ) {
    }
}
