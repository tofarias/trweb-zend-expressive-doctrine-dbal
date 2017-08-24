<?php

namespace App\Actions;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\EmptyResponse;

class PutAction extends BaseAction implements MiddlewareInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = $request->getAttribute('id');
        
        $body = $request->getParsedBody();
        
        $data = [
            'nome'      => $body['nome'],
            'emissora'  => $body['emissora'],
            'genero'    => $body['genero']
        ];
        
        $update = $this->dbal->update('series', $data, ['id' => $id]);
        
        if( $update ){
            return new EmptyResponse(202);
        }
        
        return new EmptyResponse(500);
    }
}