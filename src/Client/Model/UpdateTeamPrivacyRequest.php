<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateTeamPrivacyRequest
{
    public function __construct(
        /** Team privacy setting: 'O' for a public (open) team, 'I' for a private (invitation only) team */
        public ?string $privacy = null,
    ) {
    }
}
