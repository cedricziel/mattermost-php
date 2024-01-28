<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class ViewChannelRequest
{
    public function __construct(
        /** The channel ID that is being viewed. Use a blank string to indicate that all channels have lost focus. */
        public string $channel_id,
        /** The channel ID of the previous channel, used when switching channels. Providing this ID will cause push notifications to clear on the channel being switched to. */
        public ?string $prev_channel_id = null,
    ) {
    }
}
