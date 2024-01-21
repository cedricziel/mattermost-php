<?php

namespace CedricZiel\MattermostPhp\Client;

class AllowedIPRange
{
    /** An IP address range in CIDR notation */
    public ?string $CIDRBlock;

    /** A description for the CIDRBlock */
    public ?string $Description;
}
;