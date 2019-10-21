<?php


namespace Lam\Linkhome\Block\Adminhtml\Items\Edit\Tab;


use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;


class Main extends Generic implements TabInterface
{

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Link Home Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Link Home Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_lam_linkhome_items');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Link Home Information')]);
        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }
        $fieldset->addField(
            'name',
            'text',
            ['name' => 'name', 'label' => __('Link Name'), 'title' => __('Link Name'), 'required' => true]
        );



        $fieldset->addField(
            'details',
            'textarea',
            ['name' => 'details', 'label' => __('Details'), 'title' => __('Details'), 'required' => false]
        );
        $fieldset->addField(
            'image',
            'image',
            [
                'label' => __('Link Image'),
                'title' => __('Link Image'),
                'name' => 'image'
            ]
        );

        // change select to hidden
        $fieldset->addField(
            'pages',
            'hidden',
            [
                'name' => 'pages',
                'label' => __('Pages'),
                'options' => array(
                    '' => '-- Select Page --',
                    'Home Page' => 'Home Page',
                    'Category Page' => 'Category Page',
                    'Product Detail Page' => 'Product Detail Page',
                )
            ]
        );

        $fieldset->addField(
            'layout',
            'select',
            [
                'name' => 'layout',
                'label' => __('Image Type'),
                'options' => array(
                    'link_sub_home' => 'Link Home'
                )
            ]
        );

        $fieldset->addField(
            'link',
            'text',
            [
                'name' => 'link',
                'label' => __('Link items'),
                'title' => __('Link items'),
                'required' => false,
                'class' => 'validate-url'
            ]
        );


        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
