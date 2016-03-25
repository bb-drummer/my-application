<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Admin for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ApplicationTest;

//use PHPUnit_Framework_TestCase;

/**
 * @coversNothing
 */
class ApplicationTest extends \ApplicationTest\Framework\TestCase
{

    public function testThisIsTrue()
    {
        $this->assertTrue(true, 'this is "true"... ^^');
    }

    public function testThisIsFalse()
    {
        $this->assertFalse(false, 'this is "false"... ^^');
    }

    public function testTest()
    {
        $this->assertFalse(false, 'this is a test... ');
    }
}
