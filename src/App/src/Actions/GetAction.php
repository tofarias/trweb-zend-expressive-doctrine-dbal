<?php

namespace App\Actions;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

use Zend\Diactoros\Response\HtmlResponse;

class GetAction extends BaseAction implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = $request->getAttribute('id');

        if( !empty($id) ){
            return new \Zend\Diactoros\Response\JsonResponse( $this->getSeries($id) );
        }
        
        $series = $this->dbal->createQueryBuilder()->select('*')->from('series')->execute()->fetchAll();
        
        return new \Zend\Diactoros\Response\JsonResponse($series);
    }
    
    public function getSeries(int $id)
    {
        $series = $this->dbal->createQueryBuilder()->select('*')
                ->from('series')
                ->where('id=?')
                ->setParameter(0, $id)
                ->execute()->fetch();
        
        return $series;
    }
}