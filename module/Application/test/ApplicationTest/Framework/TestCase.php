<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Admin for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ApplicationTest\Framework;

use PHPUnit_Framework_TestCase;

/**
 * @coversNothing
 */
class TestCase extends PHPUnit_Framework_TestCase
{

    public static $locator;

    public static function setLocator($locator)
    {
        self::$locator = $locator;
    }

    public function getLocator()
    {
        return self::$locator;
    }
    
    public function testFoo() 
    {
        $this->assertTrue(true);
    }
    

    //
    // data/mock helpers
    //
    
    
    /**
     *  set mock for ZfcUserAuthentication
     */
    private function setZfcUserValidAuthMock() 
    {
        $mockAuth = $this->getMock('ZfcUser\Entity\UserInterface');
        
        $ZfcUserMock = $this->getMock('Admin\Entity\User');  
        
        $ZfcUserMock->expects($this->any())
            ->method('getId')
            ->will($this->returnValue('1'));
        
        $ZfcUserMock->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue('valid-password-reset-token'));
        
        $authMock = $this->getMock('ZfcUser\Controller\Plugin\ZfcUserAuthentication');
        
        $authMock->expects($this->any())
            ->method('hasIdentity')
            -> will($this->returnValue(true));  
        
        $authMock->expects($this->any())
            ->method('getIdentity')
            ->will($this->returnValue($ZfcUserMock));
        
        $this->getController()->getPluginManager()
            ->setService('zfcUserAuthentication', $authMock);
    }
    
    /**
     *  set mock for ZfcUserAuthentication
     */
    private function setZfcUserNoAuthMock() 
    {
        $mockAuth = $this->getMock('ZfcUser\Entity\UserInterface');
        
        $ZfcUserMock = $this->getMock('Admin\Entity\User');  

        $ZfcUserMock->expects($this->any())
            ->method('getId')
            ->will($this->returnValue(0));
        
        $ZfcUserMock->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue('valid-password-reset-token'));
        
        $authMock = $this->getMock('ZfcUser\Controller\Plugin\ZfcUserAuthentication');
        
        $authMock->expects($this->any())
            ->method('hasIdentity')
            -> will($this->returnValue(false));  
        
        $authMock->expects($this->any())
            ->method('getIdentity')
            ->will($this->returnValue($ZfcUserMock));
        
        $this->getController()->getPluginManager()
            ->setService('zfcUserAuthentication', $authMock);
    }

}
