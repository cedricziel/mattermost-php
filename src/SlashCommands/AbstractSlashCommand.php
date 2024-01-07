<?php

namespace CedricZiel\MattermostPhp\SlashCommands;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class AbstractSlashCommand implements SlashCommand
{
    public function __construct(
        protected string $command,
    ) {
    }
    abstract public function execute(SlashCommandInput $input): SlashCommandOutput;

    final public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $output = $this->execute(SlashCommandInput::fromRequest($this->command, $request));

        return $output->toResponse();
    }
}
