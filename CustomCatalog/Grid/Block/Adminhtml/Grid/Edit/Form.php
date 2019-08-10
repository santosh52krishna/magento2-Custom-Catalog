<?php
/**
 * Add New Row Form Admin Block.
 * @category  Qentelli
 * @package   CustomCatalog_Grid
 * @author    Qentelli
 * @copyright Copyright (c) 2018-2019 Qentelli (https://www.qentelli.com/)
 */
namespace CustomCatalog\Grid\Block\Adminhtml\Grid\Edit;

/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context,
     * @param \Magento\Framework\Registry $registry,
     * @param \Magento\Framework\Data\FormFactory $formFactory,
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
     * @param \CustomCatalog\Grid\Model\Status $options,
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \CustomCatalog\Grid\Model\Status $options,
        array $data = []
    ) {
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('customgrid_');
        if ($model->getProductId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Product Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Product Data'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'product_id',
            'text',
            [
                'name' => 'product_id',
                'label' => __('Product Id'),
                'id' => 'product_id',
                'title' => __('product_id'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'copywrite_info',
            'text',
            [
                'name' => 'copywrite_info',
                'label' => __('CopyWriteInfo'),
                'id' => 'copywrite_info',
                'title' => __('CopyWriteInfo'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'vpn',
            'text',
            [
                'name' => 'vpn',
                'label' => __('VPN'),
                'id' => 'vpn',
                'title' => __('VPN'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'sku',
            'text',
            [
                'name' => 'sku',
                'label' => __('SKU'),
                'id' => 'sku',
                'title' => __('SKU'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status'),
                'id' => 'status',
                'title' => __('Status'),
                'values' => $this->_options->getOptionArray(),
                'class' => 'status'
            ]
        );
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
