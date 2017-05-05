<?php
namespace SP\Slider\Block;

class Slider extends \Magento\Framework\View\Element\Template
{
    public function getSlides()
    {
        return [
            'http://farm6.static.flickr.com/5224/5658667829_2bb7d42a9c_m.jpg',
            'http://farm6.static.flickr.com/5230/5638093881_a791e4f819_m.jpg'
        ];
    }
}