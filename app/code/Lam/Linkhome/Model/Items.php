<?php

namespace Lam\Linkhome\Model;

class Items extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Lam\Linkhome\Model\Resource\Items');
    }
}
