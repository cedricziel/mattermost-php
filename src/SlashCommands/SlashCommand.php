<?php

namespace CedricZiel\MattermostPhp\SlashCommands;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

interface SlashCommand extends RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface;
    public function execute(SlashCommandInput $input): SlashCommandOutput;
}
