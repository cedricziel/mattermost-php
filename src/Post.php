<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class Post
{
    #[SerializedName('id')]
    protected string $id;

    #[SerializedName('create_at')]
    protected int $createdAt;

    #[SerializedName('update_at')]
    protected int $updatedAt;

    #[SerializedName('edit_at')]
    protected int $editedAt;

    #[SerializedName('delete_at')]
    protected int $deletedAt;

    #[SerializedName('is_pinned')]
    protected bool $isPinned;

    #[SerializedName('user_id')]
    protected string $userId;

    #[SerializedName('channel_id')]
    protected string $channelId;

    #[SerializedName('root_id')]
    protected string $rootId;

    #[SerializedName('original_id')]
    protected string $originalId;

    #[SerializedName('message')]
    protected string $message;
    /**
     * MessageSource will contain the message as submitted by the user if Message has been modified
     * by Mattermost for presentation (e.g if an image proxy is being used). It should be used to
     * populate edit boxes if present.
     */
    #[SerializedName('message_source')]
    protected ?string $messageSource;

    #[SerializedName('type')]
    protected string $type;

    #[SerializedName('props')]
    protected ?\stdClass $props = null;

    #[SerializedName('hashtags')]
    protected string $hashtags;

    #[SerializedName('file_ids')]
    protected ?array $fileIds = [];

    #[SerializedName('metadata')]
    protected ?PostMetadata $metadata = null;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Post
    {
        $this->id = $id;
        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): Post
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): Post
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getEditedAt(): int
    {
        return $this->editedAt;
    }

    public function setEditedAt(int $editedAt): Post
    {
        $this->editedAt = $editedAt;
        return $this;
    }

    public function getDeletedAt(): int
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(int $deletedAt): Post
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    public function isPinned(): bool
    {
        return $this->isPinned;
    }

    public function setIsPinned(bool $isPinned): Post
    {
        $this->isPinned = $isPinned;
        return $this;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function setUserId(string $userId): Post
    {
        $this->userId = $userId;
        return $this;
    }

    public function getChannelId(): string
    {
        return $this->channelId;
    }

    public function setChannelId(string $channelId): Post
    {
        $this->channelId = $channelId;
        return $this;
    }

    public function getRootId(): string
    {
        return $this->rootId;
    }

    public function setRootId(string $rootId): Post
    {
        $this->rootId = $rootId;
        return $this;
    }

    public function getOriginalId(): string
    {
        return $this->originalId;
    }

    public function setOriginalId(string $originalId): Post
    {
        $this->originalId = $originalId;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): Post
    {
        $this->message = $message;
        return $this;
    }

    public function getMessageSource(): ?string
    {
        return $this->messageSource;
    }

    public function setMessageSource(?string $messageSource): Post
    {
        $this->messageSource = $messageSource;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Post
    {
        $this->type = $type;
        return $this;
    }

    public function getProps(): \stdClass
    {
        return $this->props;
    }

    public function setProps(?\stdClass $props): Post
    {
        $this->props = $props;
        return $this;
    }

    public function getHashtags(): string
    {
        return $this->hashtags;
    }

    public function setHashtags(string $hashtags): Post
    {
        $this->hashtags = $hashtags;
        return $this;
    }

    public function getFileIds(): ?array
    {
        return $this->fileIds;
    }

    public function setFileIds(?array $fileIds): Post
    {
        $this->fileIds = $fileIds;
        return $this;
    }
}
