<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateChannelBookmarkRequest
{
    public function __construct(
        /** The ID of the file associated with the channel bookmark. Required for bookmarks of type 'file' */
        public ?string $file_id = null,
        /** The name of the channel bookmark */
        public ?string $display_name = null,
        /** The order of the channel bookmark */
        public ?int $sort_order = null,
        /** The URL associated with the channel bookmark. Required for type bookmarks of type 'link' */
        public ?string $link_url = null,
        /** The URL of the image associated with the channel bookmark */
        public ?string $image_url = null,
        /** The emoji of the channel bookmark */
        public ?string $emoji = null,
        /**
         * * `link` for channel bookmarks that reference a link. `link_url` is requied
         * * `file` for channel bookmarks that reference a file. `file_id` is required
         */
        public ?string $type = null,
    ) {
    }
}
