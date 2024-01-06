<?php

namespace CedricZiel\MattermostPhp\SlashCommands;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

interface SlashCommand extends RequestHandlerInterface
{
    public function setValidationToken(string $validationToken): void;
    public function validate(ServerRequestInterface $request): bool;
    public function handle(ServerRequestInterface $request): ResponseInterface;
}
