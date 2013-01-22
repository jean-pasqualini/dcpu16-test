<?php
	$dcpu = new DCPU(new Memory(), new Register());
	
	$program = new dasm($dcpu);
	
	$program->addData("couleurs", array("rouge", "vert", "bleu"));
	
	$program->createFunction("echo", array(
		"chaine" => dasm::STRING_PARAMETER
	));
	
	$program->SET($dcpu->getMemory()->getMemoryWordFromAdress("0x0002"), 3);
?>