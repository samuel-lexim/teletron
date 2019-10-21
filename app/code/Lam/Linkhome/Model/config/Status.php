<?php
 
namespace Lam\Linkhome\Model\Config;
 
use Magento\Framework\Option\ArrayInterface;
 
class Status implements ArrayInterface
{
    const ENABLED  = "enabled";
    const DISABLED = "disabled";
 
    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            self::ENABLED => __('Enabled'),
            self::DISABLED => __('Disabled')
        ];
 
        return $options;
    }
}