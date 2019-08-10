<?php

/**
 * Grid Grid Model.
 * @category  Qentelli
 * @package   CustomCatalog_Grid
 * @author    Qentelli
 * @copyright Copyright (c) 2018-2019 Qentelli (https://www.qentelli.com/)
 */

namespace CustomCatalog\Grid\Model;

use CustomCatalog\Grid\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'qentelli_custom_catalog';

    /**
     * @var string
     */
    protected $_cacheTag = 'qentelli_custom_catalog';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'qentelli_custom_catalog';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('CustomCatalog\Grid\Model\ResourceModel\Grid');
    }

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get ProductId.
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * Set ProductId.
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * Get CopyWriteInfo.
     *
     * @return text
     */
    public function getCopywriteInfo()
    {
        return $this->getData(self::COPYWRITEINFO);
    }

    /**
     * Set CopyWriteInfo.
     */
    public function setCopywriteInfo($copyWriteInfo)
    {
        return $this->setData(self::COPYWRITEINFO, $copyWriteInfo);
    }

    /**
     * Get getVpn.
     *
     * @return varchar
     */
    public function getVpn()
    {
        return $this->getData(self::VPN);
    }

    /**
     * Set Vpn.
     */
    public function setVpn($vpn)
    {
        return $this->setData(self::VPN, $vpn);
    }

    /**
     * Get Sku.
     *
     * @return varchar
     */
    public function getSku()
    {
        return $this->getData(self::SKU);
    }

    /**
     * Set Sku.
     */
    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * Get Status.
     *
     * @return varchar
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set Status.
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}
