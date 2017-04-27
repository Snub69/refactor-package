<?php

namespace FindCode\Test\Model;

use FindCode\Api\Model\PackageModelInterface;
use Snub69\MVC\SubjectInterface;

abstract class PackageModelInterfaceTest extends \PHPUnit\Framework\TestCase
{
    /**
     * 
     * @return PackageModelInterface
     */
    abstract public function getPackageModelInterface(): PackageModelInterface;
    
    /**
     * @dataProvider attributesProvider
     */
    public function testAttribut($attribut)
    {
        $mock=$this->getPackageModelInterface();
        $this->assertTrue(property_exists($mock, $attribut));
    }
    
    /**
     * attributesProvider
     */
    public final function attributesProvider()
    {
        return [
            ["name"],
            ["distribuable"],
            ["authors"],
            ["language"],
            ["package"],
            ["description"],
            ["keywords"],
            ["homepage"],
            ["require"],
            ["require_dev"],
            ["version"],
            ["license"],
            ["author"],
        ];
    }
    
    /**
     * @dataProvider methodsProvider
     */
    public function testMethod($method)
    {
        $mock=$this->getPackageModelInterface();
        $this->assertTrue(method_exists($mock, $method));
    }
    
    /**
     * methodsProvider
     */
    public final function methodsProvider()
    {
        return [
            ["get"],
            ["setAttribute"],
        ];
    }
    /**
     * testInstanceOfsubjectInterface
     */
    public function testInstanceOfSubjectInterface ()
    {
        
        $this->assertTrue(
            $this->getPackageModelInterface() instanceof SubjectInterface
            );
    }
    
    /**
     * testInstanceOfPackageModelInterface
     */
    public function testInstanceOfPackageModelInterface ()
    {
        
        $this->assertTrue(
            $this->getPackageModelInterface() instanceof PackageModelInterface
            );
    }
    
    /**
     * @expectedException RuntimeException
     */
    public function testRunTimeException ()
    {
        $this->getPackageModelInterface()->get();
    }
}
