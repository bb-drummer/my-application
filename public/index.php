<?php
/**
 * BB's Zend Framework 2 Components
 *
 * BaseApp
 *
 * @package        [MyApplication]
 * @package        BB's Zend Framework 2 Components
 * @package        BaseApp
 * @author         Björn Bartels <coding@bjoernbartels.earth>
 * @link           https://gitlab.bjoernbartels.earth/groups/zf2
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @copyright      (c) 2016 Björn Bartels <coding@bjoernbartels.earth>
 */

ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
//ini_set('error_log', '/path/to/your/php/or/apache/error_log');
ini_set('log_errors', 'On');
ini_set('display_errors', 'On');

#ini_set('session.save_handler', "redis");
#ini_set('session.save_path', $_SERVER['MY_APPLICATION_APP_DEV_REDIS_MASTER_PORT_6379_TCP']."?auth=fRfhJm02OTkqgKx2zxo34QJtVcU3DhUI");

//if (isset($_GET['__phpinfo']) && ($_GET['__phpinfo'] == 'true')) {
//    phpinfo(); die();
//}

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
