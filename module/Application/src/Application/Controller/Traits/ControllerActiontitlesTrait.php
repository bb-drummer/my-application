<?php

namespace Application\Controller\Traits;

/**
 *
 * @author bba
 *        
 */
trait ControllerActiontitlesTrait {

    /**
     * current controller actions' titles
     * @var array
     */
    protected $actionTitles = array();

    /**
     * retrieve all titles set for actions
     * 
     * @return array $actionTitles
     */
    public function getActionTitles() 
    {
        return $this->actionTitles ;
    }

    /**
     * set a (page) title for each action
     * 
     * @param array $actionTitles
     * @return self
     */
    public function setActionTitles($actionTitles = array()) 
    {
        $this->actionTitles = $actionTitles;
        return $this;
    }

    /**
     * retrieve a specific title for an action
     * 
     * @param string $action
     * @return mixed $actionTitles
     */
    public function getActionTitle($action) 
    {
        return (isset($this->actionTitles[$action]) ? $this->actionTitles[$action] : '');
    }
    
    /**
     * set a specific title for an action
     * 
     * @param string $action
     * @param string $title
     * @return self
     */
    public function setActionTitle($action, $title) 
    {
        $this->actionTitles[$action] = $title;
        return $this;
    }

}
