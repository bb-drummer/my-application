<?php
/**
 * Slm/Locale fork from https://github.com/juriansluiman/SlmLocale
 *
 * @package   Slm/Locale
 * @author    Björn Bartels <coding@bjoernbartels.earth>
 * @link      https://gitlab.bjoernbartels.earth/zf2/SlmLocale
 * @link      https://bjoernbartels.earth
 * @link      https://github.com/juriansluiman/SlmLocale
 */

namespace SlmLocale\Strategy;

use SlmLocale\Strategy\StrategyPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class StrategyPluginManagerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new StrategyPluginManager($serviceLocator);
    }
}