<?php
/**
 * Copyright © Ronan Guérin (@ronangr1) All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ronangr1\SpookyEvent\Test\Unit\Helper;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Ronangr1\SpookyEvent\Helper\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;

class TemplateTest extends TestCase
{
    private ScopeConfigInterface|MockObject $scopeConfigMock;

    private Template $templateHelper;

    protected function setUp(): void
    {
        $this->scopeConfigMock = $this->createMock(ScopeConfigInterface::class);

        $this->templateHelper = new Template($this->scopeConfigMock);
    }

    public function testGetTemplateReturnsHyvaTemplateWhenComplianceEnabled()
    {
        $this->scopeConfigMock->method('isSetFlag')
            ->with('spookyevent/general/hyva_compliance')
            ->willReturn(true);

        $this->assertEquals(
            'Ronangr1_SpookyEvent::screamer-hyva.phtml',
            $this->templateHelper->getTemplate(),
            "Hyva Compliance Enabled"
        );
    }

    public function testGetTemplateReturnsStandardTemplateWhenComplianceDisabled()
    {
        $this->scopeConfigMock->method('isSetFlag')
            ->with('spookyevent/general/hyva_compliance')
            ->willReturn(false);

        $this->assertEquals(
            'Ronangr1_SpookyEvent::screamer.phtml',
            $this->templateHelper->getTemplate(),
            "Hyva Compliance Disabled"
        );
    }
}
