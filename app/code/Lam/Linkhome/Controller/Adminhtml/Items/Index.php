<?php

namespace Lam\Linkhome\Controller\Adminhtml\Items;

class Index extends \Lam\Linkhome\Controller\Adminhtml\Items
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Lam_Linkhome::linkhome');
        $resultPage->getConfig()->getTitle()->prepend(__('Link Home CMS'));
        $resultPage->addBreadcrumb(__('Link Home'), __('Link Home'));
        $resultPage->addBreadcrumb(__('Items'), __('Items'));
        return $resultPage;
    }
}
