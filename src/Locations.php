<?php

namespace CedricZiel\MattermostPhp;

class Locations
{
    public function __construct(
        private bool $post_menu = false,
        private bool $channel_header = false,
        private bool $in_post = false,
        private bool $command = false,
    ) {
    }

    public function toJson(): array
    {
        $locations = [];
        if ($this->post_menu) {
            $locations[] = '/post_menu';
        }
        if ($this->channel_header) {
            $locations[] = '/channel_header';
        }
        if ($this->in_post) {
            $locations[] = '/in_post';
        }
        if ($this->command) {
            $locations[] = '/command';
        }

        return $locations;
    }
}
