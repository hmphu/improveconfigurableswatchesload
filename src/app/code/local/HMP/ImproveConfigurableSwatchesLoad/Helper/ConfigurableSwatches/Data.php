<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-11-06 15:54:41
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-11-06 16:01:05
 */

class HMP_ImproveConfigurableSwatchesLoad_Helper_ConfigurableSwatches_Data extends Mage_ConfigurableSwatches_Helper_Data{
    /**
     * Is the extension enabled?
     *
     * @return bool
     */
    public function isEnabled()
    {
        if (is_null($this->_enabled)) {
            if(Mage::registry('current_product')){
                $isShowSwatches = (bool) Mage::getStoreConfig(self::CONFIG_PATH_ENABLED);
            }
            else{
                $isShowSwatches = (bool) Mage::getStoreConfig(self::CONFIG_PATH_LIST_SWATCH_ATTRIBUTE);
            }
            var_dump($isShowSwatches, 'xxxx');
            $this->_enabled = (
                $isShowSwatches
                && Mage::helper('configurableswatches/productlist')->getSwatchAttribute()
            );
        }
        return $this->_enabled;
    }
}