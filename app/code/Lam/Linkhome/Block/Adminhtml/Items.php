<?php

namespace Lam\Linkhome\Block\Adminhtml;

class Items extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'Link Home';
        $this->_headerText = __('Link Home');
        $this->_addButtonLabel = __('Add New Link Home');
        parent::_construct();
    }
}
