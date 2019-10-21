<?php
/**
 * @author Samuel Kong
 * @company LeximIT
 */

namespace Lexim\Tracking\Controller\Fedex;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\App\Request\Http;

use \Magento\Fedex\Model\Carrier;


class Index extends Action
{
    protected $_fedex;

    /**
     * Index constructor
     * @param Context $context
     * @param Carrier $fedex
     */
    public function __construct(
        Context $context,
        Carrier $fedex
    )
    {
        $this->_fedex = $fedex;
        parent::__construct($context);
    }

    public function execute()
    {
        $trackingId = $this->getRequest()->getParam('id');
        $result = $this->_fedex->getTrackingFedex($trackingId);
        echo json_encode($result, true);
    }

}