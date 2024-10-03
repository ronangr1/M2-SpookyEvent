<?php
/**
 * Copyright © Ronan Guérin (@ronangr1) All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ronangr1\SpookyEvent\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\LayoutInterface;
use Ronangr1\SpookyEvent\Helper\Data;

class RandomScreamer implements ObserverInterface
{
    public function __construct(
        private readonly LayoutInterface $layout,
        private readonly Data $helper
    ) {
    }

    public function execute(Observer $observer): Observer
    {
        if ($this->helper->getRandomNumber(1, 10) === 1) {
            $block = $this->layout->getBlock('ronangr1_spooky_event');
            if ($block) {
                $block->setData('show_screamer', true);
            }
        }
        return $observer;
    }
}
