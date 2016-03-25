<?php
namespace ApplicationTest\Controller;

use \ApplicationTest\Framework\ActionControllerTestCase;

/**
 * @coversDefaultClass \Application\Controller\BaseActionController
 */
class BaseActionControllerTest extends ActionControllerTestCase
{

    /**
     * @var \Zend\Di\ServiceLocator
     */
    protected $services;
    
    /**
     * @var \Zend\I18n\Translator\TranslatorInterface
     */
    protected $translator;
    
    
    /**
     * @var array
     */
    protected $actionTitles = array();
    
    /**
     * @var array
     */
    protected $toolbarItems = array();
    
    
    /**
     * ...
  *
     * @covers ::defineActionTitles
     */
    public function testDefineActionTitlesChain() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::defineActionTitles
     */
    public function testDefineActionTitlesSetsArrayOfStrings() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::defineToolbarItems
     */
    public function testDefineToolbarItemsChain() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::defineToolbarItems
     */
    public function testDefineToolbarItemsSetsArrayOfArrays() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::setServiceLocator
     */
    public function testSetServiceLocator() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::getServiceLocator
     */
    public function testGetServiceLocator() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::getAcl
     */
    public function testGetAcl() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::getUser
     */
    public function testGetUser() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::isAdminUser
     */
    public function testIsAdminUser() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::setTranslator
     */
    public function testSetTranslator() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::getTranslator
     */
    public function testGetTranslator() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::translate
     */
    public function testTranslateText() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::getTemplateVars
     */
    public function testGetTemplateVars() 
    {
        $this->assertTrue(true);
    }


    /**
     * ...
  *
     * @covers ::setActionTitles
     */
    public function testSetMultipleActionTitlesArrayOfStrings() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::getActionTitles
     */
    public function testGetAllActionTitlesArray() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::setActionTitle
     */
    public function testSetSingleActionTitleString() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::getActionTitle
     */
    public function testGetAllActionTitleString() 
    {
        $this->assertTrue(true);
    }
    

    /**
     * ...
  *
     * @covers ::setToolbarItems
     */
    public function testSetMultipleToolbarItemsArrayOfArrays() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::setToolbarItems
     */
    public function testSetMultipleToolbarItemsArrayOfPages() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::getToolbarItems
     */
    public function testGetAllToolbarItemsArray() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::setToolbarItem
     */
    public function testSetSingleToolbarItemString() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * ...
  *
     * @covers ::getToolbarItem
     */
    public function testGetAllToolbarItemString() 
    {
        $this->assertTrue(true);
    }
    
}
