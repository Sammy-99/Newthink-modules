<?php

namespace Newthink\Di\Model;

class Other
{
    public $var;

    public function __construct($var='other class')
    {
        $this->var = $var;
        
    }

    public function getName()
    {
        return 'other class';
    }
    
}