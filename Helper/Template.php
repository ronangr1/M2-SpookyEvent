<?php
/**
 * Copyright © Ronan Guérin (@ronangr1) All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Ronangr1\SpookyEvent\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Template
{
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig,
    ) {
    }

    public function getTemplate(): string
    {
        $hyvaCompliance = $this->scopeConfig->isSetFlag('spookyevent/general/hyva_compliance');
        if ($hyvaCompliance) {
            return 'Ronangr1_SpookyEvent::screamer-hyva.phtml';
        }
        return 'Ronangr1_SpookyEvent::screamer.phtml';
    }
}
