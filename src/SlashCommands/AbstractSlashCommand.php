<?php

namespace CedricZiel\MattermostPhp\SlashCommands;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class AbstractSlashCommand implements SlashCommand
{
    protected string $validationToken;

    public function setValidationToken(string $validationToken): void
    {
        $this->validationToken = $validationToken;
    }

    public function validate(ServerRequestInterface $request): bool
    {
        $expectedHeader = 'Bearer ' . $this->validationToken;

        return $request->hasHeader('Authorization')
            && $request->getHeader('Authorization')[0] === $expectedHeader;
    }

    final public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $output = $this->execute(SlashCommandInput::fromRequest($request));

        return $output->toResponse();
    }

    abstract public function execute(SlashCommandInput $input): SlashCommandOutput;
}
