<?php
/**
 * Copyright © Ronan Guérin (@ronangr1) All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Ronangr1\SpookyEvent\Observer\RandomScreamer;
use Ronangr1\SpookyEvent\Helper\Data;

class RandomScreamerTest extends TestCase
{
    private Data|MockObject $dataHelperMock;

    private RandomScreamer $randomScreamer;

    protected function setUp(): void
    {
        $this->dataHelperMock = $this->createMock(Data::class);

        $this->randomScreamer = new RandomScreamer($this->dataHelperMock);
    }

    public function testAddSpookyDataAttributeAddsDataAttribute()
    {
        $html = '<html><body><a href="link1">Link 1</a><a href="link2">Link 2</a></body></html>';

        $this->dataHelperMock->method('getRandomNumber')->willReturn(1);

        $modifiedHtml = $this->randomScreamer->addSpookyDataAttribute($html);

        $this->assertStringContainsString('data-spooky="true"', $modifiedHtml, "Data Attribute Added On Links");
    }

    public function testAddSpookyDataAttributeDoesNotDataAddAttribute()
    {
        $html = '<html><body><a href="link1">Link 1</a><a href="link2">Link 2</a></body></html>';

        $this->dataHelperMock->method('getRandomNumber')->willReturn(5);

        $modifiedHtml = $this->randomScreamer->addSpookyDataAttribute($html);

        $this->assertStringNotContainsString('data-spooky="true"', $modifiedHtml, "Data Attribute Not Added On Links");
    }
}
