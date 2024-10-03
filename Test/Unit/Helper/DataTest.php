<?php
/**
 * Copyright © Ronan Guérin (@ronangr1) All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ronangr1\SpookyEvent\Test\Unit\Helper;

use Magento\Framework\App\Helper\Context;
use PHPUnit\Framework\TestCase;
use Ronangr1\SpookyEvent\Helper\Data;

class DataTest extends TestCase
{
    private Data $dataHelper;

    protected function setUp(): void
    {
        $contextMock = $this->createMock(Context::class);
        $this->dataHelper = new Data($contextMock);
    }

    public function testGetRandomNumberInRange(): void
    {
        $min = 1;
        $max = 10;

        $randomNumber = $this->dataHelper->getRandomNumber($min, $max);

        $this->assertIsInt($randomNumber, 'The number returned must be an integer.');
    }
}
