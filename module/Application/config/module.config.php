<?php
/**
 * BB's Zend Framework 2 Components
 * 
 * BaseApp
 *
 * @package   [MyApplication]
 * @package   BB's Zend Framework 2 Components
 * @package   BaseApp
 * @author    Björn Bartels <development@bjoernbartels.earth>
 * @link      https://gitlab.bjoernbartels.earth/groups/zf2
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @copyright copyright (c) 2016 Björn Bartels <development@bjoernbartels.earth>
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index'  => 'Application\Controller\IndexController',
            'Application\Controller\System' => 'Application\Controller\SystemController',
            'Application\Controller\Setup'  => 'Application\Controller\SetupController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'Application\Controller\Iindex',
                            ),
                        ),
                    ),
                ),
            ),
            'system' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/system[/:action]',
                    'constraints' => array(
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\System',
                        'action'     => 'index',
                    ),
                ),
            ),
            'setup' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/setup[/:action]',
                    'constraints' => array(
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Setup',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
                'update-db' => array(
                    //'type'	=> 'simple',
                    'options' => array(
                        'route'    => 'update-db [--test] [--verbose|-v]:verbose',
                        'defaults' => array(
                            'controller' => 'Application\Controller\Setup',
                            'action'     => 'updatedb',
                        ),
                    ),
                ),
            ),
        ),
    ),


    'service_manager' => array(
        'invokables' => array(
            //'Zend\Session\SessionManager' => 'Zend\Session\SessionManager',
        ),
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
            //'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        //'locale' => 'en_US', // deactivated because of SlmLocale module
        'translation_file_patterns' => array(
            array(
                'type'        => 'gettext',
                'base_dir'    => __DIR__ . '/../language',
                'pattern'    => '%s.mo',
            ),
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason'    => true,
        'display_exceptions'        => true,
        'doctype'                    => 'HTML5',
        'not_found_template'        => 'error/404',
        'exception_template'        => 'error/index',
        'template_map' => array(
            'layout/layout'    => __DIR__ . '/../view/layout/layout.phtml',
            //'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'        => __DIR__ . '/../view/error/404.phtml',
            'error/index'    => __DIR__ . '/../view/error/index.phtml',
            'layout/ajax'    => __DIR__ . '/../view/layout/ajax.phtml',
            'layout/json'    => __DIR__ . '/../view/layout/json.phtml',
            'layout/modal'    => __DIR__ . '/../view/layout/modal.phtml',
            'layout/panel'    => __DIR__ . '/../view/layout/panel.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
            'zfc-user' => __DIR__ . '/../view',
        ),
    ),
        
    'navigation_helpers' => array (
        'invokables' => array(
            // override or add a view helper
            //'menu' => '\Application\View\Helper\Navigation\Menu',
        ),
    ),
        
    'navigation' => array(
        'default' => array(
            'home' => array(
                'pages' => array(
                    'testpage' => array(
                        'label'          => 'test page',
                        'icon'           => 'exclamation-triangle',
                        'route'          => 'application/default',
                        'controller'     => 'index',
                        'action'         => 'test',
                        'resource'       => 'mvc:user',
                    ),
                ),
            ),
        ),
    ),

);
