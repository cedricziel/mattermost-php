<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UserLimits
{
    /** The maximum number of users allowed on server */
    public ?int $maxUsersLimit;

    /** The number of active users in the server */
    public ?int $activeUserCount;
}
