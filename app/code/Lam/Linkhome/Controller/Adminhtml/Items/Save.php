<?php

namespace Lam\Linkhome\Controller\Adminhtml\Items;

class Save extends \Lam\Linkhome\Controller\Adminhtml\Items
{
    public function execute()
    {

        if ($this->getRequest()->getPostValue()) {
            try {

                $model = $this->_objectManager->create('Lam\Linkhome\Model\Items');
                $data = $this->getRequest()->getPostValue();
                
                if(isset($data['image']))   unset($data['image']);

                $inputFilter = new \Zend_Filter_Input(
                    [],
                    [],
                    $data
                );

                $data = $inputFilter->getUnescaped();
                $id = $this->getRequest()->getParam('id');
                if ($id) {
                    $model->load($id);
                    if ($id != $model->getId()) {
                        throw new \Magento\Framework\Exception\LocalizedException(__('The wrong banner is specified.'));
                    }
                }

                if ($_FILES['image']['name']) {

                    $helper = $this->_objectManager->get('Lam\Linkhome\Helper\Data');
                    $basedir = $helper->getBaseDir();
                    $destinationFile = $basedir . '/' . $_FILES['image']['name'];
                    if (!file_exists($basedir)) {
                        mkdir($basedir, 0777);
                    }

                    move_uploaded_file($_FILES['image']['tmp_name'], $destinationFile);
                    if ($_FILES['image']['name'] != "") {
                        $data['image'] = "linkhomes/" . $_FILES['image']['name'];
                    }
                }

                $model->setData($data);

                $session = $this->_objectManager->get('Magento\Backend\Model\Session');
                $session->setPageData($model->getData());
                $model->save();
                $this->messageManager->addSuccess(__('You saved the banner.'));
                $session->setPageData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('lam_linkhome/*/edit', ['id' => $model->getId()]);
                    return;
                }
                $this->_redirect('lam_linkhome/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
                $id = (int)$this->getRequest()->getParam('id');
                if (!empty($id)) {
                    $this->_redirect('lam_linkhome/*/edit', ['id' => $id]);
                } else {
                    $this->_redirect('lam_linkhome/*/new');
                }
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('Something went wrong while saving the video data. Please review the error log.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_objectManager->get('Magento\Backend\Model\Session')->setPageData($data);
                $this->_redirect('lam_linkhome/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->_redirect('lam_linkhome/*/');
    }
}
