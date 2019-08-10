<?php
namespace CustomCatalog\Grid\Api;
/**  
 * Custom API
 * @category  Qentelli
 * @package   CustomCatalog_Grid
 * @author    Qentelli
 * @copyright Copyright (c) 2018-2019 Qentelli (https://www.qentelli.com/)
 */

interface VpnGetInterface
{
    /**
     *  Save product
     * @param mixed $productData
     * @return mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save($productData);

    /**
     * Get the product data
     * @param mixed $vpn
     * @return mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getProductList($vpn);

    /**
     * Update the product data
     * @param mixed $updateData
     * @return mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function update($updateData);


}
