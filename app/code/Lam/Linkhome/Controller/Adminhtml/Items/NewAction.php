<?php

namespace Lam\Linkhome\Controller\Adminhtml\Items;

class NewAction extends \Lam\Linkhome\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
