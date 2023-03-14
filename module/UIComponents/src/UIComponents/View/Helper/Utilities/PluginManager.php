<?php
/**
 * BB's Zend Framework 2 Components
 *
 * UI Components
 *
 * @package     [MyApplication]
 * @subpackage  BB's Zend Framework 2 Components
 * @subpackage  UI Components
 * @author      Björn Bartels <coding@bjoernbartels.earth>
 * @link        https://gitlab.bjoernbartels.earth/groups/zf2
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @copyright   copyright (c) 2016 Björn Bartels <coding@bjoernbartels.earth>
 */

namespace UIComponents\View\Helper\Utilities;

use UIComponents\View\Helper\AbstractPluginManager;

/**
 * Plugin manager implementation for 'Utilities' helpers
 *
 * Enforces that helpers retrieved are instances of
 * HelperInterface. Additionally, it registers a number of default
 * helpers.
 */
class PluginManager extends AbstractPluginManager
{
    /** @var string */
    protected const COMPONENT_CLASS_PATH = 'UIComponents\\View\\Helper\Utilities\\';

    /**
     * Default set of helpers
     *
     * @var array
     */
    protected $invokableClasses = [
        'element'          => self::COMPONENT_CLASS_PATH . 'Element',

        'config'        => self::COMPONENT_CLASS_PATH . 'Config',

        'apptitle'      => self::COMPONENT_CLASS_PATH . 'AppTitle',
        'appfavicon'    => self::COMPONENT_CLASS_PATH . 'AppFavicon',
        'applogo'       => self::COMPONENT_CLASS_PATH . 'AppLogo',

    	'framework'     => self::COMPONENT_CLASS_PATH . 'Framework',
    	'template'      => self::COMPONENT_CLASS_PATH . 'Framework',
    ];

}
