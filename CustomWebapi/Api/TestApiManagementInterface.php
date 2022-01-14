<?php

namespace Bluethink\CustomWebapi\Api;

interface TestApiManagementInterface
{
    /**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Bluethink\CustomWebapi\Api\Data\TestApiInterface
     */
    public function getApiData();
}