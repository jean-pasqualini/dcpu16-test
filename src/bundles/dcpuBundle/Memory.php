<?php
namespace dcpuBundle;

	class Memory extends Location {
		const size = 65536;

		public function getMemoryWordFromAdress($pointer)
		{	
			if(empty(Location::$storageLocations[hexdec($pointer)])) 
			{
				Location::$storageLocations[hexdec($pointer)] = new MemoryWord();
			}
			
			return Location::$storageLocations[hexdec($pointer)];
		}
	}
	
?>