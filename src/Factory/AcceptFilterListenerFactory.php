<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\ContentNegotiation\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZF\ContentNegotiation\AcceptFilterListener;
use Interop\Container\ContainerInterface;

class AcceptFilterListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $listener = new AcceptFilterListener();

        /* @var $options \ZF\ContentNegotiation\ContentNegotiationOptions */
        $options = $container->get('ZF\ContentNegotiation\ContentNegotiationOptions');

        $listener->setConfig($options->getAcceptWhitelist());

        return $listener;
    }

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $this($serviceLocator, AcceptFilterListenerFactory::class);
    }
}
