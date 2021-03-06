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

namespace UIComponents\View\Helper\Utilities;

use \Zend\View\Exception\InvalidArgumentException;

/**
 *
 * render nothing
 *
 */
class Framework extends \UIComponents\View\Helper\AbstractHelper 
{
    
    const NS = "\UIComponents\Framework";

    public $framework = "Bootstrap3";
    
    /**
     * View helper entry point:
     * Retrieves framework classnames collection as zend-config object
     * 
     * @see \Zend\Config\Config
     *
     * @param  string $framework [optional] framework classnames collection to relate to
     * @return \Zend\Config\Config
     */
    public function __invoke( $framework = null )
    {
        if ($framework !== null) {
            $classname = $this->NS . "\\" . $framework;
            if (!class_exists($classname)) {
                throw new \Zend\View\Exception\InvalidArgumentException(sprintf( 
                    $this->translate("Invalid framework collection '%s' specified"),
                    $framework
                ));
            }
            $this->framework = $framework;
        }
        
        return $this->getCollection();
    }

    /**
     * generate framework classnames collection as zend-config object
     * 
     * @return \Zend\Config\Config
     */
    public function getCollection()
    {
        $classname = $this->NS . "\\" . $this->framework;
        if (!class_exists($classname)) {
            throw new \Zend\View\Exception\InvalidArgumentException(sprintf( 
                $this->translate("Invalid framework collection '%s' specified"),
                $this->framework
            ));
        }
        $collection = new $classname;
        return $collection;
    }
    
	/**
	 * retrieve UI framework id/name
	 * @return string the $framework
	 */
	public function getFramework() {
		return $this->framework;
	}

	/**
	 * set UI framework id/name
	 * @param string $framework
	 * @return \UIComponents\View\Helper\Utilities\Framework
	 */
	public function setFramework($framework) {
		$this->framework = $framework;
		return $this;
	}

    
    
}