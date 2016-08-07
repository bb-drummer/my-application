<?php
/**
 * BB's Zend Framework 2 Components
 * 
 * BaseApp
 *
 * @package        [MyApplication]
 * @package        BB's Zend Framework 2 Components
 * @package        BaseApp
 * @author        Björn Bartels <coding@bjoernbartels.earth>
 * @link        https://gitlab.bjoernbartels.earth/groups/zf2
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @copyright    copyright (c) 2016 Björn Bartels <coding@bjoernbartels.earth>
 */

return array(
    'app' => array(
        'title'                => '[MyApplication]',
        'short_title'        => 'MyApp',
        'favicon'            => 'img/favicon.ico',
        'apple_touch_icon'    => 'img/apple-touch-icon.png',
        'logo'                => 'img/zf2-logo.png',

        'css' => array(
            
        ),
        'js' => array(
        	
        ),
    ),
        
    // This should be an array of module namespaces used in the application.
    'modules' => array(
        'Application',
        'ZfcBase',
        'ZfcUser',
        'SlmLocale',
        'OrgHeiglPiwik',
        'ZeTheme',

        'UIComponents',
        'Admin',
    ),
        
    // These are various options for the listeners attached to the ModuleManager
    'module_listener_options' => array(
        // This should be an array of paths in which modules reside.
        // If a string key is provided, the listener will consider that a module
        // namespace, the value of that key the specific path to that module's
        // Module class.
        'module_paths' => array(
            './public/themes',
            './module',
            './vendor',

            //'UIComponents' => '../module-uicomponents/',
            //'Admin' => '../module-admin/',
            
        ),

        // An array of paths from which to glob configuration files after
        // modules are loaded. These effectively override configuration
        // provided by modules themselves. Paths may use GLOB_BRACE notation.
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),

        // Whether or not to enable a configuration cache.
        // If enabled, the merged configuration will be cached and used in
        // subsequent requests.
        //'config_cache_enabled' => $booleanValue,

        // The key used to create the configuration cache file name.
        //'config_cache_key' => $stringKey,

        // Whether or not to enable a module class map cache.
        // If enabled, creates a module class map cache which will be used
        // by in future requests, to reduce the autoloading process.
        //'module_map_cache_enabled' => $booleanValue,

        // The key used to create the class map cache file name.
        //'module_map_cache_key' => $stringKey,

        // The path in which to cache merged configuration.
        //'cache_dir' => $stringPath,

        // Whether or not to enable modules dependency checking.
        // Enabled by default, prevents usage of modules that depend on other modules
        // that weren't loaded.
        // 'check_dependencies' => true,
    ),

    // Used to create an own service manager. May contain one or more child arrays.
    //'service_listener_options' => array(
    //     array(
    //         'service_manager' => $stringServiceManagerName,
    //         'config_key'      => $stringConfigKey,
    //         'interface'       => $stringOptionalInterface,
    //         'method'          => $stringRequiredMethodName,
    //     ),
    // )

   // Initial configuration with which to seed the ServiceManager.
   // Should be compatible with Zend\ServiceManager\Config.
   // 'service_manager' => array(),
    'view_helper_config' => array(
        'flashmessenger' => array(
            'message_open_format'      => '<div%s><button type="button" class="close-button close" data-dismiss="alert" aria-hidden="true">&times;</button><span>',
            'message_close_string'     => '</span></div>',
            'message_separator_string' => '</span><br /><span>'
        )
    ),


);
