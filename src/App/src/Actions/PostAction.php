<?php

namespace App\Actions;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\EmptyResponse;

class PostAction extends BaseAction implements MiddlewareInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $post = $request->getParsedBody();
        
        $data = [
            'nome'      => $post['nome'],
            'emissora'  => $post['emissora'],
            'genero'    => $post['genero']
        ];
        
        $res = $this->dbal->insert('series', $data);
        
        if( $res ){
          return new JsonResponse([
              'id' => (int) $this->dbal->lastInsertId()
          ]);  
        }
        
        return new EmptyResponse(500);
    }
}