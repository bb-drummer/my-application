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

use Zend\Json\Json;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Application\Controller\BaseActionController;

class JsonResultController extends BaseActionController
{
    
    /**
     * render json views examples
     * 
     * for these examples to work, set strategy config your module.config.php:
     * 
     * 'view_manager' => array(
     *    .................
     *    'strategies' => array(
     *        'ViewJsonStrategy',
     *    ),
     *    .................
     * ),
     */ 
    
    /**
     * @link    http://stackoverflow.com/questions/12451399/how-to-render-zf2-view-within-json-response
     * @link    http://stackoverflow.com/a/12651250/2408385
     */
    public function return_rendered_view_in_json_data_example_1_Action()
    {
        if (!$this->getRequest()->isXmlHttpRequest()) {
            return array();
        }
    
        $htmlViewPart = new ViewModel();
        $htmlViewPart->setTerminal(true)
            ->setTemplate('module/controller/action')
            ->setVariables(
                array(
                'key' => 'value'
                )
            );
    
        $htmlOutput = $this->getServiceLocator()
            ->get('viewrenderer')
            ->render($htmlViewPart);
    
        $jsonModel = new JsonModel();
        $jsonModel->setVariables(
            array(
            'html' => $htmlOutput,
            'jsonVar1' => 'jsonVal2',
            'jsonArray' => array(1,2,3,4,5,6)
            )
        );
    
        return $jsonModel;
    }

    /**
     * @link    http://stackoverflow.com/a/18163258/2408385
     */
    public function render_json_example_3_Action() 
    {
        $partial = $this->getServiceLocator()->get('viewhelpermanager')->get('partial');
        $data = array(
        'html' => $partial('MyModule/MyPartView.phtml', array("key" => "value")),
        'jsonVar1' => 'jsonVal2',
        'jsonArray' => array(1, 2, 3, 4, 5, 6)
        );
        $isAjax = $this->getRequest()->isXmlHttpRequest();
        return isAjax?new JsonModel($data):new ViewModel($data);
    }

    /**
     * @link    http://cmyker.blogspot.de/2012/11/zend-framework-2-ajax-return-json.html
     */
    public function render_json_example_2_Action()
    {
        $data = array(
        'result' => true,
        'data' => array()
        );
        $this->getResponse()->getHeaders()->addHeaders(array('Content-Type'=>'application/json;charset=UTF-8'));
        
        return $this->getResponse()->setContent(Json::encode($data));
    }

    /**
     * @link    https://akrabat.com/returning-json-from-a-zf2-controller-action/
     */
    public function render_json_example_1_Action()
    {
        $result = new JsonModel(
            array(
            'some_parameter' => 'some value',
            'success'=>true,
            )
        );

        return $result;
    }
}
