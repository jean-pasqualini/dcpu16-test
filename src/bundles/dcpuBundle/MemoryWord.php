<?php
namespace dcpuBundle;

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

	
?>