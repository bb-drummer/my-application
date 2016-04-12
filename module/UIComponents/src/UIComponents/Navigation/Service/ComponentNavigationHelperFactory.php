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
namespace UIComponents\Navigation\Service;

/**
 * components' navigation helper object/service factory
 *
 */
class ComponentNavigationHelperFactory extends \Zend\Navigation\Service\ConstructedNavigationFactory 
{
    /**
     * @var string|\Zend\Config\Config|array
     */
    protected $config;

    
    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    public function getName()
    {
        return 'componentnavigationhelper';
    }

}