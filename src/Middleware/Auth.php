<?php

namespace SimplePayApp\Middleware;

use SimplePayApp\Service\Auth\AuthService;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Auth
{
    
    private $authProvider;

    public function __construct(AuthService $authProvider) {
        $this->authProvider = $authProvider;
    }
    
    /**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $this->authProvider->authenticate();
        $response = $next($request, $response);
        return $response;
    }
}