<?php
namespace SP\Slider\Block;

class Slider extends \Magento\Framework\View\Element\Template
{
    public function getSlides()
    {
        return [
            $this->getViewFileUrl('SP_Slider::images/1.jpeg'),
            $this->getViewFileUrl('SP_Slider::images/2.jpeg')
        ];
    }
}