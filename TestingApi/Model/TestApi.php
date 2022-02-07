<?php

namespace Newthink\TestingApi\Model;

class TestApi  implements \Newthink\TestingApi\Api\Data\TestApiInterface
{
    public function getId()
    {
        return 10;
    }

    public function setId($id)
    {
    }

    public function getTitle()
    {
        return 'Custom Title';
    }

    public function setTitle($title)
    {
    }

    public function getDescription()
    {
        return 'this is description for our custom web api';
    }

    public function setDescription($desc)
    {
    }
}