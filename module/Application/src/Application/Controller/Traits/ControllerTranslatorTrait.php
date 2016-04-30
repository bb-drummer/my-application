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


namespace Application\Controller\Traits;

/**
 * provides translator handling
 * 
 */
trait ControllerTranslatorTrait {

	/**
     * 
     * @var \Zend\I18n\Translator\Translator
     */
    protected $translator;

    /**
     * get (global) translator instance
     * 
     * @return \Zend\I18n\Translator\Translator
     */
    public function getTranslator() 
    {
        if (!$this->translator) {
            //$this->setTranslator($this->getServiceLocator()->get('translator'));
            $this->setTranslator(\Application\Module::getService('translator'));
        }
        return $this->translator;
    }

    /**
     * get current translator instance
     * 
     * @param  \Zend\I18n\Translator\Translator $translator
     * @return self
     */
    public function setTranslator($translator) 
    {
        $this->translator = $translator;
        return ($this);
    }

    /**
     * return translated content
     * 
     * @param string $translator
     * @param string $textdomain
     * @param string $locale
     * @return string
     */
    public function translate($message, $textdomain = 'default', $locale = null) 
    {
        return ( $this->getTranslator()->translate($message, $textdomain, $locale) );
    }
    
}
