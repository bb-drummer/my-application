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
class BaseActionController extends AbstractActionController implements Dispatchable
{
	//use ServiceLocatorAwareTrait;
	use ControllerTranslatorTrait;
	use ControllerActiontitlesTrait;
	use ControllerToolbarTrait;
    
    //protected $serviceLocator;
    

    /**
     * basic constructor injecting global service manager/locator
     * @return self
     */
    public function __construct( ServiceLocatorInterface $serviceLocator )
    {
    	if ( $serviceLocator ) {
    		$this->setServiceLocator($serviceLocator);
    	}
    }
    
    /**
     * set current action titles
     * @return self
     */
    public function defineActionTitles() 
    {
        /*
         * set a title for each action via a key/value array
         * $this->setActionTitles(
         *   array(
         *      'index' => '...',
         *      ...
         *   )
         * );
         * 
         */
        return $this;
    }

    /**
     * set current toolbar items
     * @return self
     */
    public function defineToolbarItems() 
    {
        /*
         * set a page/def for each action via a key/value array
         * $this->setToolbarItems(
         *   array(
         *   	array("controller"=>"...", "action"=>"...", "label" =>...),
         *      $myZendMvcPage,
         *      ...
         *   )
         * );
         * 
         */
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
        $oEvent = $this->applyToolbarOnDispatch($e);
        $result = parent::onDispatch($oEvent);
        return $result;
    }
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function getServiceLocator()
    {
        return $this->serviceLocator;
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