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

namespace UIComponents\View\Helper;

/**
 * Proxy helper for retrieving navigational helpers and forwarding calls
 */
class Utilities extends AbstractProxyHelper
{
    /**
     * View helper namespace
     *
     * @var string
     */
    const NS = 'UIComponents\View\Helper\Utilities';
    /**
     * Helper entry point
     *
     * @param  string|AbstractContainer $container container to operate on
     * @return Bootstrap
     */
    public function __invoke($container = null)
    {
        if (null !== $container) {
            $this->setContainer($container);
        }

        return $this;
    }

    /**
     * Retrieve plugin loader for navigation helpers
     *
     * Lazy-loads an instance of Navigation\HelperLoader if none currently
     * registered.
     *
     * @return Bootstrap\PluginManager
     */
    public function getPluginManager()
    {
        if (null === $this->plugins) {
            $this->setPluginManager(new Utilities\PluginManager());
        }

        return $this->plugins;
    }

    public function requestInfo($param = null)
    {
        $sm = $this->getServiceLocator()->getServiceLocator();

        $router = $sm->get('router');
        $request = $sm->get('request');
        $matchedRoute = $router->match($request);

        if ($matchedRoute) {
            $params = $matchedRoute->getParams();
    
            $controller = $params['controller'];
            if (isset($params['__NAMESPACE__'])) {
                $controller = $params['__NAMESPACE__'] . '\\' . $params['controller'];
            }
            $action = $params['action'];
    
            $module_array = explode('\\', $controller);
            $module = array_pop($module_array);
    
            $route = $matchedRoute->getMatchedRouteName();
    
            $info = array(
                'module' => $module,
                'module' => array_shift(explode('\\', $controller)),
                'controller' => $controller,
                'controller' => array_pop(explode('\\', $controller)),
                'action' => $action,
                'route' => $route,
                'module_array' => $module_array,
                'params' => $params,
            );
    
            if ($param === null) {
                return $info;
            }
            return $info[$param];
        }
    }

    public function requestSlug()
    {
        $info = $this->requestInfo();
        if ($info) {
            $slug = strtolower($info['module']) . '-' . 
                strtolower($info['controller']) . '-' . 
                strtolower($info['action']);
    
            return $slug;
        }
    }
}
