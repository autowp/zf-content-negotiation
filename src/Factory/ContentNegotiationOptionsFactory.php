<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\ContentNegotiation\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF\ContentNegotiation\ContentNegotiationOptions;
use Interop\Container\ContainerInterface;

class ContentNegotiationOptionsFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = [];

        if ($container->has('Config')) {
            $appConfig = $container->get('Config');
            if (isset($appConfig['zf-content-negotiation'])
                    && is_array($appConfig['zf-content-negotiation'])
                    ) {
                        $config = $appConfig['zf-content-negotiation'];
                    }
        }

        return new ContentNegotiationOptions($config);
    }

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, ContentNegotiationOptionsFactory::class);
    }
}
