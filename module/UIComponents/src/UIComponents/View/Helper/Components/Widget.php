<?php
/**
 * BB's Zend Framework 2 Components
 * 
 * UI Components
 *
 * @package        [MyApplication]
 * @subpackage        BB's Zend Framework 2 Components
 * @subpackage        UI Components
 * @author        Björn Bartels <coding@bjoernbartels.earth>
 * @link        https://gitlab.bjoernbartels.earth/groups/zf2
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @copyright    copyright (c) 2016 Björn Bartels <coding@bjoernbartels.earth>
 */

namespace UIComponents\View\Helper\Components;

/**
 *
 * render nothing
 *
 */
class Widget extends Element
{
    protected $tagname = 'div';
    
    protected $classnames = 'widget';
    
    /**
     * View helper entry point:
     * Retrieves helper and optionally sets component options to operate on
     *
     * @param  array|StdClass $options [optional] component options to operate on
     * @return self
     */
    public function __invoke($options = array())
    {
        parent::__invoke($options);
        return $this;

        /* render partial template 
		use Zend\View\Model\ViewModel;
		use Zend\View\Renderer\PhpRenderer;
		
        $viewRender = new PhpRenderer();
        $viewRender->resolver()->addPath(__DIR__.'/view/');
        
        $viewModel = new ViewModel();
        $viewModel->setVariables($user->__getArrayCopy());
        $viewModel->setVariable('confirmation_url', $config["zfcuser_mail_http_basepath"].'/confirmuserregistration/' . $user->getId() . '/' . $user->getToken());

        $viewModel->setTemplate('pathto/template_phtml');
        $htmlMarkup = $viewRender->render($viewModel);
        */ 
    }
    
    
}