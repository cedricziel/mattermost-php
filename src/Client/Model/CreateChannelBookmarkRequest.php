<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateChannelBookmarkRequest
{
    public function __construct(
        /** The name of the channel bookmark */
        public string $display_name,
        /**
         * * `link` for channel bookmarks that reference a link. `link_url` is requied
         * * `file` for channel bookmarks that reference a file. `file_id` is required
         */
        public string $type,
        /** The ID of the file associated with the channel bookmark. Required for bookmarks of type 'file' */
        public ?string $file_id = null,
        /** The URL associated with the channel bookmark. Required for bookmarks of type 'link' */
        public ?string $link_url = null,
        /** The URL of the image associated with the channel bookmark. Optional, only applies for bookmarks of type 'link' */
        public ?string $image_url = null,
        /** The emoji of the channel bookmark */
        public ?string $emoji = null,
    ) {
    }
}
