<?php

namespace Bluethink\CustomWebapi\Model;

/**
 * Marketplace Product Model.
 *
 * @method \Webkul\Marketplace\Model\ResourceModel\Product _getResource()
 * @method \Webkul\Marketplace\Model\ResourceModel\Product getResource()
 */
class TestApi  implements \Bluethink\CustomWebapi\Api\Data\TestApiInterface
{
    /**
     * Get ID.
     *
     * @return int
     */
    public function getId()
    {
        return 254364;
    }

    /**
     * Set ID.
     *
     * @param int $id
     *
     * @return \Bluethink\Marketplace\Api\Data\ProductInterface
     */
    public function setId($id)
    {
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return 'Custom Title';
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return \Bluethink\Marketplace\Api\Data\ProductInterface
     */
    public function setTitle($title)
    {
    }

    /**
     * Get desc.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return 'this is description for our custom web api';
    }

    /**
     * Set Desc.
     *
     * @param string $desc
     *
     * @return \Bluethink\Marketplace\Api\Data\ProductInterface
     */
    public function setDescription($desc)
    {
    }
}