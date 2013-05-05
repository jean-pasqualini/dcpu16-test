<?php
namespace dcpuBundle;

	abstract class StorageLocation {
		
        private $value = 0;
        
		public function getValue()
		{
            return $this->value;
		}
		
		public function setValue($value)
		{
			$this->value = hexdec($value);
		}
	}
	
	
?>