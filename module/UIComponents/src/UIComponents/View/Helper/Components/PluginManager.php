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

namespace UIComponents\View\Helper\Components;

use UIComponents\View\Helper\AbstractPluginManager;

/**
 * Plugin manager implementation for 'Components' helpers
 *
 * Enforces that helpers retrieved are instances of
 * Components\HelperInterface. Additionally, it registers a number of default
 * helpers.
 */
class PluginManager extends AbstractPluginManager
{
    /** @var string */
    protected const COMPONENT_CLASS_PATH = 'UIComponents\\View\\Helper\Components\\';

    /**
     * Default set of helpers
     *
     * @var    array
     */
    protected $invokableClasses = [

    	// panels
    	//
        'element'           => self::COMPONENT_CLASS_PATH . 'Element',
        'block'             => self::COMPONENT_CLASS_PATH . 'Block',
        //'well'              => self::COMPONENT_CLASS_PATH . 'Well',
        //'jumbotron'         => self::COMPONENT_CLASS_PATH . 'Jumbotron',
        'panel'             => self::COMPONENT_CLASS_PATH . 'Panel',
        'widget'            => self::COMPONENT_CLASS_PATH . 'Widget',
        'dashboard'         => self::COMPONENT_CLASS_PATH . 'Dashboard',

    	// page components
    	//
        'nav'               => self::COMPONENT_CLASS_PATH . 'Navbar',
        //'navbar'            => self::COMPONENT_CLASS_PATH . 'Navbar',
        'topbar'            => self::COMPONENT_CLASS_PATH . 'Navbar',
        'breadcrumbs'       => self::COMPONENT_CLASS_PATH . 'Breadcrumbs',
        'languagemenu'      => self::COMPONENT_CLASS_PATH . 'Languagemenu',
    	'toolbar'           => self::COMPONENT_CLASS_PATH . 'Toolbar',

        // controls
        //
        'button'            => self::COMPONENT_CLASS_PATH . 'Button',
        'buttongroup'       => self::COMPONENT_CLASS_PATH . 'Buttongroup',
    	//'inputgroup'        => self::COMPONENT_CLASS_PATH . 'Inputgroup',
        //'progressbar'       => self::COMPONENT_CLASS_PATH . 'Progressbar',

    	// forms
    	//
        'formgroup'         => self::COMPONENT_CLASS_PATH . 'Formgroup',

    	// lists/tables
    	//
        //'listgroup'         => self::COMPONENT_CLASS_PATH . 'Listgroup',
        'table'         	=> self::COMPONENT_CLASS_PATH . 'Listgroup',
    	//'pagination'        => self::COMPONENT_CLASS_PATH . 'Pagination',

    	// widgets
    	//
        //'label'             => self::COMPONENT_CLASS_PATH . 'Label',
        //'badge'             => self::COMPONENT_CLASS_PATH . 'Badge',
        //'pageheader'        => self::COMPONENT_CLASS_PATH . 'Pageheader',
        //'thumbnail'         => self::COMPONENT_CLASS_PATH . 'Thumbnail',

        //'mediaobject'       => self::COMPONENT_CLASS_PATH . 'Mediaobject',
        //'embed'             => self::COMPONENT_CLASS_PATH . 'Embed',

        // javascript components
        //
        //'datatable'         => self::COMPONENT_CLASS_PATH . 'Datatable',
        'modal'             => self::COMPONENT_CLASS_PATH . 'Modal',
        //'dropdown'          => self::COMPONENT_CLASS_PATH . 'Dropdown',
        //'tab'               => self::COMPONENT_CLASS_PATH . 'Tab',
        //'tooltip'           => self::COMPONENT_CLASS_PATH . 'Tooltip',
        //'popover'           => self::COMPONENT_CLASS_PATH . 'Popover',
        //'alert'             => self::COMPONENT_CLASS_PATH . 'Alert',
        //'button'            => self::COMPONENT_CLASS_PATH . 'Button',
        //'collapse'          => self::COMPONENT_CLASS_PATH . 'Collapse',
        //'carousel'          => self::COMPONENT_CLASS_PATH . 'Carousel',
    ];

}
