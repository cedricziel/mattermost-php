<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Additional information used to display a post.
 */
class PostMetadata
{
    public function __construct(
        /**
         * Information about content embedded in the post including OpenGraph previews, image link previews, and message attachments. This field will be null if the post does not contain embedded content.
         */
        public ?array $embeds = null,
        /**
         * The custom emojis that appear in this point or have been used in reactions to this post. This field will be null if the post does not contain custom emojis.
         */
        public ?array $emojis = null,
        /**
         * The FileInfo objects for any files attached to the post. This field will be null if the post does not have any file attachments.
         */
        public ?array $files = null,
        /**
         * An object mapping the URL of an external image to an object containing the dimensions of that image. This field will be null if the post or its embedded content does not reference any external images.
         */
        public ?\stdClass $images = null,
        /**
         * Any reactions made to this point. This field will be null if no reactions have been made to this post.
         */
        public ?array $reactions = null,
        /**
         * Post priority set for this post. This field will be null if no priority metadata has been set.
         */
        public ?\stdClass $priority = null,
        /**
         * Any acknowledgements made to this point.
         */
        public ?array $acknowledgements = null,
    ) {
    }

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): PostMetadata {
        $object = new self(
            embeds: isset($data['embeds']) ? $data['embeds'] : null,
            emojis: isset($data['emojis']) ? $data['emojis'] : null,
            files: isset($data['files']) ? $data['files'] : null,
            images: isset($data['images']) ? (object) $data['images'] : null,
            reactions: isset($data['reactions']) ? $data['reactions'] : null,
            priority: isset($data['priority']) ? (object) $data['priority'] : null,
            acknowledgements: isset($data['acknowledgements']) ? $data['acknowledgements'] : null,
        );
        return $object;
    }
}
