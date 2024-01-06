<?php

namespace CedricZiel\MattermostPhp\SlashCommands\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ParsingMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ($request->getMethod() === 'POST' && $request->hasHeader('content-type') && $request->getHeader('content-type')[0] === 'application/json') {
            return $handler->handle($request->withParsedBody(json_decode($request->getBody()->getContents())));
        }

        if ($request->getMethod() === 'POST' && $request->hasHeader('content-type') && $request->getHeader('content-type')[0] === 'application/x-www-form-urlencoded') {
            mb_parse_str($request->getBody()->getContents(), $parsedBody);

            return $handler->handle($request->withParsedBody($parsedBody));
        }

        return $handler->handle($request);
    }
}
