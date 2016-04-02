<?php
/**
 * BB's Zend Framework 2 Components
 * 
 * BaseApp
 *
 * @package        [MyApplication]
 * @package        BB's Zend Framework 2 Components
 * @package        BaseApp
 * @author        Björn Bartels <development@bjoernbartels.earth>
 * @link        https://gitlab.bjoernbartels.earth/groups/zf2
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @copyright    copyright (c) 2016 Björn Bartels <development@bjoernbartels.earth>
 */

return array(
    'navigation' => array(
        'default' => array(
            'home' => array(
                'label' => 'home',
                'icon'    => 'home',
                'route' => 'home',
                'order' => 0,
                'pages'            => array(
                ),
            ),
            'help' => array(
                'label'            => 'help',
                'icon'            => 'question-circle',
                'route'            => 'application/default',
                'controller'    => 'index',
                'action'         => 'notimplementedyet',
                'order'            => 99999,
                'pages'            => array(
                    array(
                        'label'            => 'help',
                        'icon'            => 'question-circle',
                        'route'            => 'application/default',
                        'controller'    => 'index',
                        'action'         => 'help',
                    ),
                    array(
                        'label'            => 'support',
                        'icon'            => 'envelope',
                        'route'            => 'application/default',
                        'controller'    => 'index',
                        'action'         => 'support',
                    ),
                    array(
                        'label'         => 'about',
                        'icon'            => 'info-circle',
                        'route'            => 'application/default',
                        'controller'    => 'index',
                        'action'         => 'about',
                    ),
                ),
            ),
        ),
    ),
);