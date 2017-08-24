<?php

namespace App\Auth;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

class Guard implements MiddlewareInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        if( $request->getHeaderLine('Authorization') == 'Bearer 1234567' ){
            return $delegate->process($request);
        }
        
        return new \Zend\Diactoros\Response\EmptyResponse(401);
    }
}