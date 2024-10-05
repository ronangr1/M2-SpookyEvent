<?php
/**
 * Copyright © Ronan Guérin (@ronangr1) All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ronangr1\SpookyEvent\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Ronangr1\SpookyEvent\Helper\Data;

class RandomScreamer implements ObserverInterface
{
    public function __construct(
        private readonly Data $helper
    ) {
    }

    public function execute(Observer $observer): Observer
    {
        $response = $observer->getData('response');
        $html = $response->getBody();

        $html = $this->addSpookyDataAttribute($html);

        $response->setBody($html);

        return $observer;
    }

    public function addSpookyDataAttribute($html): false|string
    {
        $dom = new \DOMDocument();

        \libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        \libxml_clear_errors();

        $links = $dom->getElementsByTagName('a');

        foreach ($links as $link) {
            if ($this->helper->getRandomNumber(1, 10) === 1) {
                $link->setAttribute('data-spooky', 'true');
            }
        }

        return $dom->saveHTML();
    }
}
