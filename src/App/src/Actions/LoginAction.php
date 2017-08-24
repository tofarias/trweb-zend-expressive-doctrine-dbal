<?php

namespace App\Actions;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

class LoginAction implements MiddlewareInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $post = $request->getParsedBody();
        
        if( $post['user'] == 'admin' && $post['senha'] == '1234' ){
            return new \Zend\Diactoros\Response\JsonResponse([
               'token' => 'Bearer 1234567' 
            ], 202);
        }
        
        return new \Zend\Diactoros\Response\EmptyResponse(500);
    }
}