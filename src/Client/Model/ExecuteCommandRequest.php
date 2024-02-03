<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ExecuteCommandRequest
{
    public function __construct(
        /** Channel Id where the command will execute */
        public string $channel_id,
        /** The slash command to execute, including parameters. Eg, `'/echo bounces around the room'` */
        public string $command,
    ) {
    }
}
