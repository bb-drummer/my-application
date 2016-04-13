<?php
/**
 * BB's Zend Framework 2 Components
 *
 * BaseApp
 *
 * @package   [MyApplication]
 * @package   BB's Zend Framework 2 Components
 * @package   BaseApp
 * @author    Björn Bartels <coding@bjoernbartels.earth>
 * @link      https://gitlab.bjoernbartels.earth/groups/zf2
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @copyright copyright (c) 2016 Björn Bartels <coding@bjoernbartels.earth>
 */

namespace Application\Controller;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\Stdlib\DispatchableInterface as Dispatchable;
use ZfcUser\Controller\Plugin\ZfcUserAuthentication;
use Application\Controller\Traits\ControllerTranslatorTrait;
use Application\Controller\Traits\ControllerActiontitlesTrait;
use Application\Controller\Traits\ControllerToolbarTrait;

/**
 * BaseController
 *
 * @author
 *
 * @version
 */
class BaseActionController extends AbstractActionController implements Dispatchable, ServiceLocatorAwareInterface
{
	use ControllerTranslatorTrait;
	use ControllerActiontitlesTrait;
	use ControllerToolbarTrait;
    
    protected $services;
    
    /**
     * set current action titles
     * @return self
     */
    public function defineActionTitles() 
    {
        /*$this->setActionTitles(
            array(
            )
        );*/
        return $this;
    }

    /**
     * set current toolbar items
     * @return self
     */
    public function defineToolbarItems() 
    {
        /*$this->setToolbarItems(
            array(
            )
        );*/
        return $this;
    }

    /**
     * initialize titles and toolbar items
     * 
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractActionController::onDispatch()
     */
    public function onDispatch(MvcEvent $e)
    {
        /**
         * @var $serviceManager \Zend\ServiceManager\ServiceManager 
         */
        $serviceManager = $this->getServiceLocator();
        
        \Zend\Navigation\Page\Mvc::setDefaultRouter($serviceManager->get('router'));
        $this->defineActionTitles();
        $this->defineToolbarItems();
        
        $action = $e->getRouteMatch()->getParam('action');
        $this->layout()->setVariable("title", $this->getActionTitle($action));

        $toolbarItems = $this->getToolbarItem($action);
        if ($toolbarItems) {
            $toolbarNav = $serviceManager->get('componentnavigationhelper');
            $toolbarNav->addPages($toolbarItems);
        }
        
        $result = parent::onDispatch($e);
        return $result;
    }
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->services;
    }

    /**
     * retrieve current ACL
     * 
     * @return \Zend\Permissions\Acl\Acl
     */
    public function getAcl() 
    {
        return $this->getServiceLocator()->get('\Admin\Model\AclService');
    }

    /**
     * retrieve current user
     * 
     * @return ZfcUserAuthentication
     */
    public function getUser() 
    {

        $oAuth = $this->getServiceLocator()->get('zfcuser_auth_service');
        if ($oAuth->hasIdentity() ) {
            return $oAuth->getIdentity();
        }
        return null;
    }
    
    /**
     * determine if we have a AJAX request
     * 
     * @return boolean
     */
    public function isXHR()
    {
    	/**
    	 * @var \Zend\Http\PhpEnvironment\Request|\Zend\Http\Request $request
    	 */
    	$request = $this->getRequest();
    	if ( 
    		($request instanceof \Zend\Http\PhpEnvironment\Request) ||
    		($request instanceof \Zend\Http\Request) 
    	) {
    		return ( $request->isXmlHttpRequest() );
    	}
    	return (false);
    }
    
    /**
     * determine if current user has admin role set
     * 
     * @return boolean
     */
    public function isAdminUser()
    {
        $oUser = $this->getUser();
        $sAclRole = $oUser->getAclrole();
        return ($sAclRole == 'admin');
    }
    
    
    /**
     * fetch request parameters
     * 
     * @param array $vars [optional] additional variables
     * @return array
     */
    public function getTemplateVars( $vars = array() ) 
    {
        $result = (array_merge( 
            $this->params()->fromRoute(), 
            $this->params()->fromPost(),
            array(
            "isXHR" => $this->getRequest()->isXmlHttpRequest()
            )
        ));
        if (is_array($vars)) {
            $result = (array_merge(
                $result, $vars
            ));
        }
        return ($result);
    }

}