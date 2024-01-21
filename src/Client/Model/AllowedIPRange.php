<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class AllowedIPRange
{
    /** An IP address range in CIDR notation */
    public ?string $CIDRBlock;

    /** A description for the CIDRBlock */
    public ?string $Description;
}
;