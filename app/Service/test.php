<?php

namespace Service;

use Interfaces\IService;

use dcpuBundle\DCPU;
use dcpuBundle\Memory;
use dcpuBundle\MemoryWord;
use dcpuBundle\Register;
use dcpuBundle\RegisterLocation;
use dcpuBundle\StorageLocation;
use dcpuBundle\dasm;

class test implements IService {
	
	private $loadconf;
	private $configuration;
	
	public function __construct($loadconf)
	{
		$this->loadconf = $loadconf;
		
		$this->configuration = $this->loadconf->loadConfigurationFile("dcpu");
	}
	
	public static function getServiceName()
	{
		return "dasm.application.test";
	}
	
	public static function isAutoload()
	{
		return true;
	}
	
	public static function getDependances()
	{
		return array("zeroframework.loadconf");
	}
	
	public static function isReceiveUpdate()
	{
		return true;
	}
	
	public static function getTags()
	{
		return array("event.onCommand");
	}
	
	
	public function updateOnCommand()
	{
		echo "dcpu limit à ".$this->configuration["memoryLimit"]."\n";
		
		$dcpu = new DCPU(new Memory(), new Register());
	
		$program = new dasm($dcpu);
		
		$program->addData("couleurs", array("rouge", "vert", "bleu"));
		
		$program->createFunction("echo", array(
			"chaine" => dasm::STRING_PARAMETER
		));
		
		$program->SET($dcpu->getMemory()->getMemoryWordFromAdress("0x0002"), 3);
	}
	
	
}

?>