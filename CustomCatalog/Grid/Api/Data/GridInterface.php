<?php
/**
 * Grid GridInterface.
 * @category  Qentelli
 * @package   CustomCatalog_Grid
 * @author    Qentelli
 * @copyright Copyright (c) 2018-2019 Qentelli (https://www.qentelli.com/)
 */

namespace CustomCatalog\Grid\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const PRODUCT_ID = 'product_id';
    const COPYWRITEINFO = 'copywrite_info';
    const VPN = 'vpn';
    const SKU = 'sku';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';

   /**
    * Get EntityId.
    *
    * @return int
    */
    public function getEntityId();

   /**
    * Set EntityId.
    */
    public function setEntityId($entityId);

    /**
    * Get ProductId.
    *
    * @return int
    */
    public function getProductId();

   /**
    * Set ProductId.
    */
    public function setProductId($productId);

   /**
    * Get CopyWriteInfo.
    *
    * @return varchar
    */
    public function getCopyWriteInfo();

   /**
    * Set CopyWriteInfo.
    */
    public function setCopyWriteInfo($copyWriteInfo);

   /**
    * Get Vpn.
    *
    * @return varchar
    */
    public function getVpn();

   /**
    * Set Vpn.
    */
    public function setVpn($vpn);

   /**
    * Get Sku.
    *
    * @return varchar
    */
    public function getSku();

   /**
    * Set Sku.
    */
    public function setSku($sku);

   /**
    * Get Status.
    *
    * @return varchar
    */
    public function getStatus();

   /**
    * Set Status.
    */
    public function setStatus($status);

   /**
    * Get CreatedAt.
    *
    * @return varchar
    */
    public function getCreatedAt();

   /**
    * Set CreatedAt.
    */
    public function setCreatedAt($createdAt);
}
