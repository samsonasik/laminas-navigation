<?php

declare(strict_types=1);

namespace LaminasTest\Navigation\View;

use Laminas\Navigation\View\ViewHelperManagerDelegatorFactory;
use Laminas\ServiceManager\ServiceManager;
use Laminas\View\Helper\Navigation as NavigationHelper;
use Laminas\View\HelperPluginManager;
use PHPUnit\Framework\TestCase;

class ViewHelperManagerDelegatorFactoryTest extends TestCase
{
    public function testFactoryConfiguresViewHelperManagerWithNavigationHelpers(): void
    {
        $services = new ServiceManager();
        $helpers  = new HelperPluginManager($services);
        $callback = fn() => $helpers;

        $factory = new ViewHelperManagerDelegatorFactory();
        $this->assertSame($helpers, $factory($services, 'ViewHelperManager', $callback));

        $this->assertTrue($helpers->has('navigation'));
        $this->assertTrue($helpers->has(NavigationHelper::class));
    }
}
