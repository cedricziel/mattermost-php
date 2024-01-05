<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class PostMetadata
{
    public function __construct(
        #[SerializedName('embeds')]
        protected readonly ?array $embeds = null,
        #[SerializedName('emojis')]
        protected readonly ?array $emojis = null,
        #[SerializedName('files')]
        protected readonly ?array $files = null,
        #[SerializedName('images')]
        protected readonly ?array $images = null,
        #[SerializedName('reactions')]
        protected readonly ?array $reactions = null,
        #[SerializedName('acknowledgements')]
        protected readonly ?array $acknowledgements = null,
    ) {
    }

    public function getEmbeds(): ?array
    {
        return $this->embeds;
    }

    public function getEmojis(): ?array
    {
        return $this->emojis;
    }

    public function getFiles(): ?array
    {
        return $this->files;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function getReactions(): ?array
    {
        return $this->reactions;
    }

    public function getAcknowledgements(): ?array
    {
        return $this->acknowledgements;
    }
}
