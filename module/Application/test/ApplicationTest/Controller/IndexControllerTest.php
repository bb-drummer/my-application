<?php
namespace ApplicationTest\Controller;

use \Application\Controller\IndexController,
    \ApplicationTest\Framework\ActionControllerTestCase,
    Zend\Http\Request,
    Zend\Http\Response,
    Zend\Http\Router,
    Zend\Mvc\MvcEvent,
    Zend\Mvc\Router\RouteMatch,
    Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter
;

/**
 * @coversDefaultClass \Application\Controller\IndexController
 */
class IndexControllerTest extends BaseActionControllerTest
{
    
    /**
     * controller setup
     */
    public function setupController()
    {
        $this->setController(new IndexController());
        $this->getController()->setServiceLocator($this->getApplicationServiceLocator());
        $this->setRequest(new Request());
        $this->setRouteMatch(new RouteMatch(array('controller' => '\Application\Controller\Index', 'action' => 'index')));
        $this->setEvent(new MvcEvent());
        $config = $this->getApplicationServiceLocator()->get('Config');
        $routerConfig = isset($config['router']) ? $config['router'] : array();
        $router = HttpRouter::factory($routerConfig);
        $this->getEvent()->setRouter($router);
        $this->getEvent()->setRouteMatch($this->getRouteMatch());
        $this->getController()->setEvent($this->getEvent());
        $this->setResponse(new Response());
    }

    /**
     * is the action accessable per request/response action name ?
  *
     * @covers ::indexAction
     */
    public function testIndexActionCanBeDispatched()
    {
        // Specify which action to run
        $this->routeMatch->setParam('action', 'index');
        $this->routeMatch->setParam('type', 'mvc');
        
        // Kick the controller into action
        $result = $this->controller->dispatch($this->request);
    
        // Check the HTTP response code
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    
        // Check for a ViewModel to be returned
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
    
        // Test the parameters contained in the View model
        //$vars = $result->getVariables();
        //$this->assertTrue(isset($vars['var']));
    }
    
    /**
     * is the action accessable per request/response action name ?
  *
     * @covers ::helpAction
     */
    public function testHelpActionCanBeDispatched()
    {
        // Specify which action to run
        $this->routeMatch->setParam('action', 'help');
        $this->routeMatch->setParam('type', 'mvc');
        
        // Kick the controller into action
        $result = $this->controller->dispatch($this->request);
    
        // Check the HTTP response code
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    
        // Check for a ViewModel to be returned
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
    
        // Test the parameters contained in the View model
        //$vars = $result->getVariables();
        //$this->assertTrue(isset($vars['var']));
    }
    
    /**
     * is the action accessable per request/response action name ?
  *
     * @covers ::supportAction
     */
    public function testSupportActionCanBeDispatched()
    {
        // Specify which action to run
        $this->routeMatch->setParam('action', 'support');
        $this->routeMatch->setParam('type', 'mvc');
        
        // Kick the controller into action
        $result = $this->controller->dispatch($this->request);
    
        // Check the HTTP response code
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    
        // Check for a ViewModel to be returned
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
    
        // Test the parameters contained in the View model
        //$vars = $result->getVariables();
        //$this->assertTrue(isset($vars['var']));
    }
    
    /**
     * is the action accessable per request/response action name ?
  *
     * @covers ::aboutAction
     */
    public function testAboutActionCanBeDispatched()
    {
        // Specify which action to run
        $this->routeMatch->setParam('action', 'about');
        $this->routeMatch->setParam('type', 'mvc');
        
        // Kick the controller into action
        $result = $this->controller->dispatch($this->request);
    
        // Check the HTTP response code
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    
        // Check for a ViewModel to be returned
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
    
        // Test the parameters contained in the View model
        //$vars = $result->getVariables();
        //$this->assertTrue(isset($vars['var']));
    }
    
    /**
     * is the action accessable per request/response action name ?
  *
     * @covers ::testAction
     */
    public function testTestActionCanBeDispatched()
    {
        // Specify which action to run
        $this->routeMatch->setParam('action', 'test');
        $this->routeMatch->setParam('type', 'mvc');
        
        // Kick the controller into action
        $result = $this->controller->dispatch($this->request);
    
        // Check the HTTP response code
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    
        // Check for a ViewModel to be returned
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
    
        // Test the parameters contained in the View model
        //$vars = $result->getVariables();
        //$this->assertTrue(isset($vars['var']));
    }
    
    /**
     * is the action accessable per request/response action name ?
  *
     * @covers ::xhrtestAction
     */
    public function testXhrtestActionCanBeDispatched()
    {
        // Specify which action to run
        $this->routeMatch->setParam('action', 'xhrtest');
        $this->routeMatch->setParam('type', 'mvc');
        
        // Kick the controller into action
        $result = $this->controller->dispatch($this->request);
    
        // Check the HTTP response code
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    
        // Check for a ViewModel to be returned
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result);
    
        // Test the parameters contained in the View model
        //$vars = $result->getVariables();
        //$this->assertTrue(isset($vars['var']));
    }
    
    /**
     * 404 page
     */
    public function test404()
    {
        $this->routeMatch->setParam('action', 'action-not-found');
        $this->routeMatch->setParam('type', 'mvc');
        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();
        $this->assertEquals(404, $response->getStatusCode());
    }
    
}
