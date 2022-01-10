<?php

namespace Newthink\Di\Model;

class Custom
{
    public $namespace;
    public $fruits;

    public function __construct($namespace = 'this is default text', $fruits = [])
    {
        $this->namespace = $namespace;
        $this->fruits = $fruits;
    }
    
}