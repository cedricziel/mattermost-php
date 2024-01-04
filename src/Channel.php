<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

final readonly class Channel
{
    public function __construct(
        #[SerializedName('id')]
        protected string  $id,
        #[SerializedName('team_id')]
        protected ?string $team_id = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTeamId(): ?string
    {
        return $this->team_id;
    }
}
