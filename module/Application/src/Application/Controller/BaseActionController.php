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

namespace Application\Controller;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\DispatchableInterface as Dispatchable;
use ZfcUser\Controller\Plugin\ZfcUserAuthentication;

/**
 * BaseController
 *
 * @author
 *
 * @version
 */
class BaseActionController extends AbstractActionController implements Dispatchable, ServiceLocatorAwareInterface
{
    
    protected $services;
    
    protected $translator;
    
    protected $actionTitles = array();

    protected $toolbarItems = array();
    
    
    public function defineActionTitles() 
    {
        /*$this->setActionTitles(
            array(
            )
        );*/
        return $this;
    }

    public function defineToolbarItems() 
    {
        /*$this->setToolbarItems(
            array(
            )
        );*/
        return $this;
    }

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
     * 
     * @return \Zend\Permissions\Acl\Acl
     */
    public function getAcl() 
    {
        return $this->getServiceLocator()->get('\Admin\Model\AclService');
    }

    /**
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
     * @return boolean
     */
    public function isAdminUser() 
    {
        $oUser = $this->getUser();
        $sAclRole = $oUser->getAclrole();
        return ($sAclRole == 'admin');
    }
    
    
    /**
     * @return \Zend\I18n\Translator\Translator
     */
    public function getTranslator() 
    {
        if (!$this->translator) {
            $this->setTranslator($this->getServiceLocator()->get('translator'));
        }
        return $this->translator;
    }

    /**
     * @param field_type $translator
     */
    public function setTranslator($translator) 
    {
        $this->translator = $translator;
        return ($this);
    }

    /**
     * @param string $translator
     * @param string $textdomain
     * @param string $locale
     */
    public function translate($message, $textdomain = 'default', $locale = null) 
    {
        return ( $this->getTranslator()->translate($message, $textdomain, $locale) );
    }
    
    /**
     * fetch request parameters
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
    
    
    // //   action titles

    /**
     * @return the $actionTitles
     */
    public function getActionTitles() 
    {
        return $this->actionTitles ;
    }

    /**
     * @param array $actionTitles
     */
    public function setActionTitles($actionTitles = array()) 
    {
        $this->actionTitles = $actionTitles;
        return $this;
    }

    /**
     * @return the $actionTitles
     */
    public function getActionTitle($action) 
    {
        return (isset($this->actionTitles[$action]) ? $this->actionTitles[$action] : '');
    }
    
    /**
     * @param string $action
     * @param string $title
     */
    public function setActionTitle($action, $title) 
    {
        $this->actionTitles[$action] = $title;
        return $this;
    }
    
    
    // //   toolbar items

    /**
     * @return the $toolbarItems
     */
    public function getToolbarItems() 
    {
        return $this->toolbarItems ;
    }
    
    /**
     * @param array $toolbarItems
     */
    public function setToolbarItems($toolbarItems = array()) 
    {
        $this->toolbarItems = $toolbarItems;
        return $this;
    }
    
    /**
     * @return the $actionTitles
     */
    public function getToolbarItem($action) 
    {
        return (isset($this->toolbarItems[$action]) ? $this->toolbarItems[$action] : null);
    }
    
    /**
     * @param string $action
     * @param string $title
     */
    public function setToolbarItem($action, $item) 
    {
        $this->toolbarItems[$action] = $item;
        return $this;
    }
    
    
}