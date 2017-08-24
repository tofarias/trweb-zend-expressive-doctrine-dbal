<?php

namespace App\Factory;

use Interop\Container\ContainerInterface;

class ActionFactory
{
    public function __invoke(ContainerInterface $container, $action)
    {
        if( class_exists($action) ){
            return new $action($container->get('DBAL'));
        }
        
        throw new Exception('Erro, não existe action: '.$action);
    }
}
