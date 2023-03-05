<?php

namespace Application\Controller\Traits;

/**
 *
 * @author bba
 *        
 */
trait ControllerToolbarTrait {

    /**
     * current controller actions' titles
     * @var array
     */
    protected $toolbarItems = array();
    
    /**
     * get all toolbar items
     * 
     * @return array $toolbarItems
     */
    public function getToolbarItems() 
    {
        return $this->toolbarItems ;
    }
    
    /**
     * set all toolbar items, an item is simply an Array or Zend\Mvc\AbstractPage object
     * 
     * @param array $toolbarItems
     * @return self
     */
    public function setToolbarItems($toolbarItems = array()) 
    {
        $this->toolbarItems = $toolbarItems;
        return $this;
    }
    
    /**
     * get a single toolbar items for a specific action
     * 
     * @return array $actionTitles
     */
    public function getToolbarItem($action) 
    {
        return (isset($this->toolbarItems[$action]) ? $this->toolbarItems[$action] : null);
    }
    
    /**
     * set a single toolbar items for a specific action
     * 
     * @param array|\Zend\Mvc\AbstractPage $action
     * @param string $title
     * @return self
     */
    public function setToolbarItem($action, $item) 
    {
        $this->toolbarItems[$action] = $item;
        return $this;
    }
    
    /**
     * apply toolbar configuration on controller dispatch
     * 
     * @param \Zend\Mvc\MvcEvent $oEvent dispatch event
     * @return \Zend\Mvc\MvcEvent
     */
    public function applyToolbarOnDispatch(\Zend\Mvc\MvcEvent $oEvent) 
    {
        \Zend\Navigation\Page\Mvc::setDefaultRouter(\Application\Module::getService('router'));
        $this->defineActionTitles();
        $this->defineToolbarItems();
        
        $action = $oEvent->getRouteMatch()->getParam('action');
        $this->layout()->setVariable("title", $this->getActionTitle($action));

        $toolbarItems = $this->getToolbarItem($action);
        if ($toolbarItems) {
            $toolbarNav = \Application\Module::getService('componentnavigationhelper');
            $toolbarNav->addPages($toolbarItems);
        }
        return $oEvent;
    }

    
}
