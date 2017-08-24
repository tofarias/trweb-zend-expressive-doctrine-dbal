<?php

namespace App\Actions;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

use Zend\Diactoros\Response\EmptyResponse;

class DeleteAction extends BaseAction implements MiddlewareInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = $request->getAttribute('id');
        
        if( $this->dbal->delete('series', ['id' => $id]) ){
            return new EmptyResponse(204);
        }
        
        return new EmptyResponse(500);
    }
}