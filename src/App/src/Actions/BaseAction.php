<?php

namespace App\Actions;

abstract class BaseAction
{
    protected $dbal;
    
    public function __construct($dbal)
    {
        $this->dbal = $dbal;
    }
}