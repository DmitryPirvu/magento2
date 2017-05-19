<?php
namespace SP\Slider\Block;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\View\Element\Template;
use SP\Slider\Api\Data\CarouselInterface;

class Slider extends Template implements IdentityInterface
{
    public function getSlides()
    {
        return [
            $this->getViewFileUrl('SP_Slider::images/1.jpeg'),
            $this->getViewFileUrl('SP_Slider::images/2.jpeg')
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getIdentities()
    {
        return [CarouselInterface::CACHE_TAG];
    }
}