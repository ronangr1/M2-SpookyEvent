<?php
/**
 * Copyright © Ronan Guérin (@ronangr1) All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ronangr1\SpookyEvent\Block;

use Magento\Framework\View\Element\Template;

class Screamer extends Template
{
    public function getShowScreamer(): ?bool
    {
        return $this->getData('show_screamer');
    }
}
