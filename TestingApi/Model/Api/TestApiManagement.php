<?php

namespace Newthink\TestingApi\Model\Api;

class TestApiManagement implements \Newthink\TestingApi\Api\TestApiManagementInterface
{
    protected $_testApiFactory;

    public function __construct(
        \Newthink\TestingApi\Model\TestApiFactory $testApiFactory

    ) {
        $this->_testApiFactory = $testApiFactory;
    }

    public function getApiData()
    {
        try {
            $model = $this->_testApiFactory
                ->create();

            if (!$model->getId()) {
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('no data found')
                );
            }

            return $model;
            
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $returnArray['error'] = $e->getMessage();
            $returnArray['status'] = 0;
            $this->getJsonResponse(
                $returnArray
            );
        }
    }
}