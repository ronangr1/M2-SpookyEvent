<?php
/**
 * Copyright © Ronan Guérin (@ronangr1) All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ronangr1\SpookyEvent\Test\Unit\Block;

use PHPUnit\Framework\TestCase;
use Ronangr1\SpookyEvent\Block\Screamer;

class ScreamerTest extends TestCase
{
    public function testGetShowScreamerReturnsTrue(): void
    {
        $block = $this->getMockBuilder(Screamer::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getData'])
            ->getMock();

        $block->expects($this->once())
            ->method('getData')
            ->with('show_screamer')
            ->willReturn(true);

        $this->assertTrue($block->getShowScreamer());
    }

    public function testGetShowScreamerReturnsFalse(): void
    {
        $block = $this->getMockBuilder(Screamer::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getData'])
            ->getMock();

        $block->expects($this->once())
            ->method('getData')
            ->with('show_screamer')
            ->willReturn(false);

        $this->assertFalse($block->getShowScreamer());
    }

    public function testGetShowScreamerReturnsNull(): void
    {
        $block = $this->getMockBuilder(Screamer::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getData'])
            ->getMock();

        $block->expects($this->once())
            ->method('getData')
            ->with('show_screamer')
            ->willReturn(null);

        $this->assertNull($block->getShowScreamer());
    }
}
