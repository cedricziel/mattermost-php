<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Timer
{
    public function __construct(
        /**
         * At is the unix time in milliseconds when the timer should be executed.
         */
        #[SerializedName('at')]
        private readonly int     $at,
        /**
         * Call is the (one-way) call to make upon the timers execution.
         */
        #[SerializedName('call')]
        private readonly Call    $call,
        /**
         * channel_id is a channel ID that is used for expansion of the Call (optional).
         */
        #[SerializedName('channel_id')]
        private readonly ?string $channel_id = null,
        /**
         * team_id is a team ID that is used for expansion of the Call (optional).
         */
        #[SerializedName('team_id')]
        private readonly ?string $team_id = null,
    ) {
    }

    public function getAt(): int
    {
        return $this->at;
    }

    public function getCall(): Call
    {
        return $this->call;
    }

    public function getChannelId(): ?string
    {
        return $this->channel_id;
    }

    public function getTeamId(): ?string
    {
        return $this->team_id;
    }

    public static function create(
        \DateTimeInterface $at,
        Call $call,
        ?string $channel_id = null,
        ?string $team_id = null,
    ): Timer {
        return new self(
            $at->getTimestamp() * 1000,
            $call,
            $channel_id,
            $team_id,
        );
    }
}
