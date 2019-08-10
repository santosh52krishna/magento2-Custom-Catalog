<?php

/**
 * Grid Admin Cagegory Map Record Save Controller.
 * @category  Qentelli
 * @package   CustomCatalog_Grid
 * @author    Qentelli
 * @copyright Copyright (c) 2018-2019 Qentelli (https://www.qentelli.com/)
 */
namespace CustomCatalog\Grid\Controller\Adminhtml\Grid;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \CustomCatalog\Grid\Model\GridFactory
     */
    var $gridFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \CustomCatalog\Grid\Model\GridFactory $gridFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \CustomCatalog\Grid\Model\GridFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->gridFactory = $gridFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('grid/grid/addrow');
            return;
        }
        try {
            $rowData = $this->gridFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Product data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('grid/grid/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('CustomCatalog_Grid::save');
    }
}
