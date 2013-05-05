<?php
namespace dcpuBundle;

Class dasm 
	{
		const BREAKLINE = "\r\n";
		
		const STRING_PARAMETER = 1;
		const INT_PARAMETER = 2;
		const POINTER_PARAMETER = 3;
	
		private $datas = array();
        private $functions = array();
        
		private $dcpu;
		
		public function __construct($dcpu)
		{
			$this->dcpu = $dcpu;
		}
		
		public function SET(StorageLocation $storageLocation, $value)
		{
			$storageLocation->setValue($value);
			
			echo "SET ".Location::getStaticLocationFromStorageLocation($storageLocation).", ".$value.self::BREAKLINE;
		}
		
		public function ADD(StorageLocation $storageLocation)
		{
		}
		
		public function IFN()
		{
		}
		
        /**
         *  
         */
		public function createFunction($functionname, $parameters = array(), $handle)
		{
            $this->functions[$functionname] = $handle;
		}
        
        public function __call($functionName, $param)
        {
            $this->goToLabel("function".$functionName);
        }
		
		public function addData($label, $values = array())
		{
			$this->datas[] = ":".$label." DAT ".implode(",", $values).self::BREAKLINE;
		}
		
		public function createLabel($labelname)
		{
			echo ":".$labelname.self::BREAKLINE;
		}
        
        public function goToLabel($labelname)
        {
            echo $this->SET($this->dcpu->getRegister()->getRegisterLocation("PC"), $labelname);
        }
		
		public function __destruct()
		{
				// Build datas
				echo implode(self::BREAKLINE, $this->datas).self::BREAKLINE;
                
                foreach($this->functions as $functionname => $handle)
                {
            	    $this->createLabel("function".$functionname);
                    $handle();
                }
		}
	}

?>