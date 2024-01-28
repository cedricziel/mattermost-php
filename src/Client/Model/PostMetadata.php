<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * Additional information used to display a post.
 */
class PostMetadata
{
    /**
     * Information about content embedded in the post including OpenGraph previews, image link previews, and message attachments. This field will be null if the post does not contain embedded content.
     */
    public ?array $embeds;

    /**
     * The custom emojis that appear in this point or have been used in reactions to this post. This field will be null if the post does not contain custom emojis.
     */
    public ?array $emojis;

    /**
     * The FileInfo objects for any files attached to the post. This field will be null if the post does not have any file attachments.
     */
    public ?array $files;

    /**
     * An object mapping the URL of an external image to an object containing the dimensions of that image. This field will be null if the post or its embedded content does not reference any external images.
     */
    public ?\stdClass $images;

    /**
     * Any reactions made to this point. This field will be null if no reactions have been made to this post.
     */
    public ?array $reactions;

    /**
     * Post priority set for this post. This field will be null if no priority metadata has been set.
     */
    public ?\stdClass $priority;

    /**
     * Any acknowledgements made to this point.
     */
    public ?array $acknowledgements;

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var array $data['embeds'] */
        if (isset($data['embeds'])) $this->embeds = $data['embeds'];
        /** @var array $data['emojis'] */
        if (isset($data['emojis'])) $this->emojis = $data['emojis'];
        /** @var array $data['files'] */
        if (isset($data['files'])) $this->files = $data['files'];
        /** @var stdClass $data['images'] */
        if (isset($data['images'])) $this->images = (object) $data['images'];
        /** @var array $data['reactions'] */
        if (isset($data['reactions'])) $this->reactions = $data['reactions'];
        /** @var stdClass $data['priority'] */
        if (isset($data['priority'])) $this->priority = (object) $data['priority'];
        /** @var array $data['acknowledgements'] */
        if (isset($data['acknowledgements'])) $this->acknowledgements = $data['acknowledgements'];
        return $this;
    }
}
