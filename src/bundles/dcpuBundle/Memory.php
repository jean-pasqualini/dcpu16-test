<?php
namespace dcpuBundle;

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
	
?>