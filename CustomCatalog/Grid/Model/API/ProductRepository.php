<?php
/**  
 * Custom API
 * @category  Qentelli
 * @package   CustomCatalog_Grid
 * @author    Qentelli
 * @copyright Copyright (c) 2018-2019 Qentelli (https://www.qentelli.com/)
 */
namespace CustomCatalog\Grid\Model\API;

use CustomCatalog\Grid\Api\VpnGetInterface;

class ProductRepository implements VpnGetInterface
{
    public $productModel;
    public $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger, \CustomCatalog\Grid\Model\Grid $productModel
    ) {
        $this->productModel = $productModel;
        $this->logger = $logger;

    }
    
    /**
     * To save product
     * @param mixed $productData
     * @return mixed
     */
    public function save($productData)
    {
        try{
            $data = [];
            $flag = "false";
            if (!empty($productData)) {
                if (empty(trim($productData['product_id'])) || empty(trim($productData['copywrite_info'])) || empty(trim($productData['vpn'])) || empty(trim($productData['sku']))) {
                    $flag = "true";
                }
                if ($flag == "false") {
                    $data['product_id']     = $productData['product_id'];
                    $data['copywrite_info'] = $productData['copywrite_info'];
                    $data['vpn']            = $productData['vpn'];
                    $data['sku']            = $productData['sku'];
                    $data['status']         = $productData['status'];
                    $this->productModel->setData($data);
                    $this->productModel->save();
                    return "Product saved successfully";
                } else {
                    return "Please provide all mandetory fields data";
                }
            }
                
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Get Product Details by VPN
     * @param mixed $vpn
     * @return mixed
     */
    public function getProductList($vpn)
    {
        try{
            $data   = [];
            $result = [];
            if(!empty($vpn)){
                $loadProduct    = $this->productModel->load($vpn, 'vpn');
                if (!empty($loadProduct->getEntityId())) {
                    $data['product_id']         = $loadProduct->getProductId();
                    $data['copywrite_info']     = $loadProduct->getdata('copywrite_info');
                    $data['vpn']                = $loadProduct->getVpn();
                    $data['sku']                = $loadProduct->getSku();
                    $data['status']             = $loadProduct->getStatus();
                    $result[] = $data;
                    return $result;
                } else {
                    return "Please provide valid VPN";
                }
            }
                
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update Product Details by VPN
     * @param mixed $updateData
     * @return mixed
     */
    public function update($updateData)
    {
        try{
            $data = [];
            $flag = "false";
            if (!empty($updateData)) {
                $trimmed_array = array_map('trim',$updateData);
                if (!isset($trimmed_array['vpn'])) {
                    $flag = "true";
                }
                if ($flag == "false") {
                    $loadProduct    = $this->productModel->load($updateData['vpn'], 'vpn');
                    if ($loadProduct) {
                        // $productInfo    = $existProduct->getData();
                        if (isset($updateData['product_id'])) {
                            $loadProduct->setProductId($updateData['product_id']);
                        }
                        if (isset($updateData['copywrite_info'])) {
                            $loadProduct->setCopywriteInfo($updateData['copywrite_info']);
                        }
                        if (isset($updateData['sku'])) {
                            $loadProduct->setSku($updateData['sku']);
                        }
                        if (isset($updateData['status'])) {
                            $loadProduct->setStatus($updateData['status']);
                        }
                        $loadProduct->save();
                        return "Product updated successfully";
                    } else {
                        return "Product not found with vpn value '".$updateData['vpn']."'";
                    }
                } else {
                    return "Please provide VPN value";
                }
            }
                
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
