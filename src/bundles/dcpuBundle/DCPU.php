<?php
namespace dcpuBundle;

	Class DCPU {
		private $memory;
		private $register;
		
		public function __construct($memory, $register)
		{
			$this->setMemory($memory);
			$this->setRegister($register);
		}
		
		public function setMemory($memory)
		{
			$this->memory = $memory;
		}
		
		public function setRegister($register)
		{
			$this->register = $register;
		}
		
		public function getMemory()
		{
			return $this->memory;
		}
		
		public function getRegister()
		{
			return $this->register;
		}
	}
	
?>