<?php

namespace Newthink\TestingApi\Api;

interface TestApiManagementInterface
{
    /**
     * get test Api data.
     *
     * @api
     *
     * @param int $id
     *
     * @return \Newthink\TestingApi\Api\Data\TestApiInterface
     */
    public function getApiData($id);
}