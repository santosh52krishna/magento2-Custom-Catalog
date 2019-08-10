<?php

/**
 * Grid Grid Collection.
 * @category  Qentelli
 * @package   CustomCatalog_Grid
 * @author    Qentelli
 * @copyright Copyright (c) 2018-2019 Qentelli (https://www.qentelli.com/)
 */
namespace CustomCatalog\Grid\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            'CustomCatalog\Grid\Model\Grid',
            'CustomCatalog\Grid\Model\ResourceModel\Grid'
        );
    }
}
