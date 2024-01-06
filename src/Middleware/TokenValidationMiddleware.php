<?php

namespace CedricZiel\MattermostPhp\Middleware;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TokenValidationMiddleware implements MiddlewareInterface
{
    public function __construct(
        protected ?string $validationToken,
    ) {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ($this->validationToken === null) {
            return $handler->handle($request);
        }

        $expectedHeader = 'Bearer ' . $this->validationToken;

        if ($request->hasHeader('Authorization') && $request->getHeader('Authorization')[0] === $expectedHeader) {
            return $handler->handle($request);
        }

        return new Response(401, [], 'Unauthorized');
    }
}
