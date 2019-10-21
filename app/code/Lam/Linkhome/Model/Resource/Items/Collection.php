<?php

namespace Lam\Linkhome\Model\Resource\Items;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Lam\Linkhome\Model\Items', 'Lam\Linkhome\Model\Resource\Items');
    }
}
