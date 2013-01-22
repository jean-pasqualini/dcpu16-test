<?php
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
	
	
	
	Class Register {
	
		const A = 0;
		const B = 1;
		const C = 2;
		const X = 3;
		const Y = 4;
		const Z = 5;
		const I = 6;
		const J = 7;
	
		public static $registerLocations = array();
	
		public static function addRegisterLocation(RegisterLocation $instance)
		{
		}
	}
	
	class StorageLocation {
		
		public function getValue()
		{
		}
	
	}
	
	Class RegisterLocation {
		
	}
	
	class Memory {
		const size = 65536;
		
		private $memoryWords = array();
		
		public function getMemoryWordFromAdress($pointer)
		{	
			if(empty($this->memoryWords[hexdec($pointer)])) 
			{
				$this->memoryWords[hexdec($pointer)] = new MemoryWord($pointer);
			}
			
			return $this->memoryWords[hexdec($pointer)];
		}
	}
	
	Class MemoryWord extends StorageLocation {
		private $value = 0;
		private $emplacement = 0;
		
		public function __construct($emplacement)
		{
			$this->setEmplacement($emplacement);
		}
		
		public function setEmplacement($emplacement)
		{
			$this->emplacement = hexdec($emplacement);
		}
		
		public function getEmplacement()
		{
			return dechex($this->emplacement);
		}
		
		public function getValue()
		{
		}
		
		public function setValue($value)
		{
			$this->value = hexdec($value);
		}
	}

	Class dasm 
	{
		const BREAKLINE = "\r\n";
		
		const STRING_PARAMETER = 1;
		const INT_PARAMETER = 2;
		const POINTER_PARAMETER = 3;
	
		private $datas = array();
		private $dcpu;
		
		public function __construct($dcpu)
		{
			$this->dcpu = $dcpu;
		}
		
		public function SET(StorageLocation $storageLocation, $value)
		{
			$storageLocation->setValue($value);
			
			echo "SET ".$storageLocation->getEmplacement().", ".$value.self::BREAKLINE;
		}
		
		public function ADD(StorageLocation $storageLocation)
		{
		}
		
		public function IFN()
		{
		}
		
		public function createFunction($functionname, $parameters = array())
		{
			$this->createLabel($functionname);
		}
		
		public function addData($label, $values = array())
		{
			$this->datas[] = ":".$label." DAT ".implode(",", $values).self::BREAKLINE;
		}
		
		public function createLabel($labelname)
		{
			echo ":".$labelname.self::BREAKLINE;
		}
		
		public function __destruct()
		{
				// Build datas
				echo implode(self::BREAKLINE, $this->datas).self::BREAKLINE;
		}
	}
	
	if(empty($argv[1])) exit("usage : php dasm.php votreprogramme.dasm16.php");
	
	if(!file_exists($argv[1])) exit("dasm file ".$argv[1]." does not exist !");
	
	require_once($argv[1]);
?>