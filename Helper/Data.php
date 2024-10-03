<?php
/**
 * Copyright © Ronan Guérin (@ronangr1) All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ronangr1\SpookyEvent\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    public function getRandomNumber(int $min, int $max): int
    {
        return \mt_rand($min, $max);
    }
}
