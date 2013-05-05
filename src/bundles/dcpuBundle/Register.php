<?php
namespace dcpuBundle;
	
	Class Register extends Location {
	
		const A = "A";
		const B = "B";
		const C = "C";
		const X = "X";
		const Y = "Y";
		const Z = "Z";
		const I = "I";
		const J = "J";
        const PC = "PC";
	
		public function addRegisterLocation($name, RegisterLocation $instance)
		{
            Location::$storageLocations[$name] = $instance;
		}
        
        public function __construct()
        {
            $this->addRegisterLocation(Register::A, new RegisterLocation());
            $this->addRegisterLocation(Register::B, new RegisterLocation());
            $this->addRegisterLocation(Register::C, new RegisterLocation());
            $this->addRegisterLocation(Register::X, new RegisterLocation());
            $this->addRegisterLocation(Register::Y, new RegisterLocation());
            $this->addRegisterLocation(Register::Z, new RegisterLocation());
            $this->addRegisterLocation(Register::I, new RegisterLocation());
            $this->addRegisterLocation(Register::J, new RegisterLocation());
            $this->addRegisterLocation(Register::PC, new RegisterLocation());
        }
        
        public function getRegisterLocation($name)
        {
            return Location::$storageLocations[$name];
        }
	}
	
?>