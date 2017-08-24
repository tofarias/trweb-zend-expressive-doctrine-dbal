<?php

namespace App\Actions;

use Interop\Http\ServerMiddleware\MiddlewareInterface;

use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

class ApiAction implements MiddlewareInterface
{
    
    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface {
        
        return new HtmlResponse('Rota de informação');
    }

}