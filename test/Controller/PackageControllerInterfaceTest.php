<?php

namespace FindCode\Test\Controller;

use FindCode\Api\Controller\PackageControllerInterface;
use PHPUnit\Framework\TestCase;

/**
 * 
 * @author Administrateur
 *
 */
abstract class PackageControllerInterfaceTest extends TestCase
{

    /**
     * get PackageControllerInterface
     * @return PackageControllerInterface
     */
    abstract public function getPackageControllerInterface(
        ): PackageControllerInterface;
    
    /**
     * testMethod
     */
    public function testMethod()
    {
        $this->assertTrue(
            method_exists(
                $this->getPackageControllerInterface(),
                "execute"
                )
        );
    }
    
    /**
     * testInstanceOfControllerInterface
     */
    public function testInstanceOfControllerInterface()
    {
        $this->assertTrue(
                $this->getPackageControllerInterface()
                instanceof PackageControllerInterface
            );
    }
    
    /**
     * @runInSeparateProcess
     */
    public function testExecute()
    {
        $mock=$this->getPackageControllerInterface();
        $outpout=$mock->execute();
        $this->assertTrue(is_string($outpout));
    }
}
