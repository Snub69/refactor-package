<?php

namespace FindCode\Api\Model;

use Snub69\MVC\AbstractSubject;
use Snub69\MVC\SubjectInterface;
use RuntimeException;

class PackageModel extends AbstractSubject implements
    SubjectInterface,
    PackageModelInterface
{
	public
	$package,
	$language,
	$version,
	$keywords,
	$distribuable,
	$description,
	$testable,
	$name,
	$license,
	$homepage,
	$author,
	$require,
	$require_dev,
	$authors,
	$type;
	

	
	
	public function __construct()
	{
		parent::__construct();
		$this->package="";
		$this->type="library";
		$this->testable=false;
		$this->language="";
		$this->version=[];
		$this->keywords=[];
		$this->distribuable=false;
		$this->description="";
		$this->name="";
		$this->license="";
		$this->homepage="";
		$this->author="";
		$this->require=[];
		$this->require_dev=[];
		$this->authors=[];
		
		
	}
	public function setAttribute (\stdClass $obj)
	{
	    if (isset($obj->description) && is_string($obj->description)) {
	        $this->description = $obj->description;
	    }
	    if (isset($obj->name) && is_string($obj->name)) {
	        $this->name = $obj->name;
	    }
		if (isset($obj->license) && is_string($obj->license)) {
		    $this->license = $obj->license;
		}
		if (isset($obj->homepage) && is_string($obj->homepage)) {
		    $this->homepage = $obj->homepage;
		}
	}
	
	private function consume($url, $ping = false)
	{
		$filename=__DIR__ . "/cache/" . md5($url);
// 		if (file_exists($filename)) {
// 			$output = file_get_contents($filename);
// 		} else {
		    $code="404";
			$output = @file_get_contents($url);
			if (isset ($http_response_header)) {
			$tab=explode(" ", $http_response_header[0]);
			$code=$tab[1];
			}
			if ($code==="200") {
// 			    file_put_contents($filename, ($ping?$url:$output));
			} else {
			    $ping=false;
			}
// 			var_dump($ping);
// 		}
		return $ping?$ping:json_decode($output);
	} 
	
	private function consumePackage()
	{
		$url ="https://raw.githubusercontent.com/"
		    . $this->package . "/master/package.json";
		$obj = $this->consume($url);

		if ($obj) {
			$this->language = "js";
			$this->setAttribute($obj);
			if (isset($obj->version) && is_string($obj->version)) {
		         $this->version[] = $obj->version;
			}
			if (isset($obj->author) && is_string($obj->author)) {
			    $this->author = $obj->author;
			}
			if (isset($obj->keywords) && is_array($obj->keywords)) {
			    $this->keywords[] = $obj->keywords;
			}
			$this->consumeNpmjs();
			$this->consumeTravis();
			return true;
		}
		return false;
	}
	
	
	private function consumeComposer()
	{
		$url ="https://raw.githubusercontent.com/" . $this->package
		    . "/master/composer.json";
		$obj = $this->consume($url);
		if ($obj) {
			$this->language = "php";
			$this->setAttribute($obj);
			if (isset($obj->require) && is_array($obj->require)) {
			    $this->require[] = $obj->require;
			}
			if (isset($obj->require_dev) && is_array($obj->require_dev)) {
			    $this->require_dev[] = $obj->require_dev;
			}
			if (isset($obj->authors) && is_array($obj->authors)) {
			    $this->authors[] = $obj->authors;
			}
			if (isset($obj->version) && is_array($obj->version)) {
			    $this->version[] = $obj->version;
			}
			$this->consumePackagist();
			$this->consumeTravis();
			return true;
		}
		return false;
	}

	private function consumePackagist()
	{
	    $url ="https://packagist.org/packages/" . $this->package . ".json";
	    $obj = $this->consume($url);
	    if ($obj) {
	        
	        $this->distribuable = true;
	        foreach ($obj->package->versions as $key => $name) {
	            $this->version[] = $key;
	        }
	    }
	}

	private function consumeNpmjs()
	{
	    $url ="https://www.npmjs.com/package/" . $this->name;
	    return $this->distribuable = (bool) $this->consume($url, true);

	}
	
	private function consumeTravis()
	{
	    $url ="https://raw.githubusercontent.com/" . $this->package . "/master/.travis.yml";
	    return $this->testable = (bool) $this->consume($url, true);
	} 

	public function get()
	{
		if (!$this->consumePackage()
		 && !$this->consumeComposer()) {
			throw new RuntimeException();
		}
	}
}
