<?php
/**
 * Copyright © Ronan Guérin (@ronangr1) All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ronangr1\SpookyEvent\Test\Unit\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\LayoutInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Ronangr1\SpookyEvent\Helper\Data;
use Ronangr1\SpookyEvent\Observer\RandomScreamer;

class RandomScreamerTest extends TestCase
{
    private LayoutInterface|MockObject $layoutMock;

    private Data|MockObject $helperMock;

    private RandomScreamer $randomScreamer;

    protected function setUp(): void
    {
        $this->layoutMock = $this->getMockBuilder(LayoutInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->helperMock = $this->getMockBuilder(Data::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->randomScreamer = new RandomScreamer(
            $this->layoutMock,
            $this->helperMock
        );
    }

    public function testExecuteSetsShowScreamerWhenProbabilityMatches(): void
    {
        $this->helperMock->expects($this->once())
            ->method('getRandomNumber')
            ->with(0, 10)
            ->willReturn(1);

        $blockMock = $this->getMockBuilder(AbstractBlock::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->layoutMock->expects($this->once())
            ->method('getBlock')
            ->with('ronangr1_spooky_event')
            ->willReturn($blockMock);

        $blockMock->expects($this->once())
            ->method('setData')
            ->with('show_screamer', true);

        $observerMock = $this->createMock(Observer::class);

        $this->randomScreamer->execute($observerMock);
    }

    public function testExecuteDoesNotSetShowScreamerWhenProbabilityDoesNotMatch(): void
    {
        $this->helperMock->expects($this->once())
            ->method('getRandomNumber')
            ->with(0, 10)
            ->willReturn(2);

        $this->layoutMock->expects($this->never())
            ->method('getBlock');

        $observerMock = $this->createMock(Observer::class);

        $this->randomScreamer->execute($observerMock);
    }
}
