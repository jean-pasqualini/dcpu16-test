<?php
	try {
		session_start();
		include(__DIR__."/../../../core.php");
		
		define("__CORE_DIRECTORY__", core::__getCoreDirectory());
		define("__APP_DIRECTORY__", __DIR__."/../app/");
		
		include(__CORE_DIRECTORY__."/core.functions.php");
		include(__CORE_DIRECTORY__."/autoLoader.php");
		include(__CORE_DIRECTORY__."/Execption.php");
		
		// Charge toutes les librairies
		array_map(function($file) { include ($file); }, glob(__DIR__."/../../../lib/*.php"));
	
		// Enregistre l'autoloader
		autoLoader::register();
		autoLoader::loadCache();
			
		autoLoader::setAllBaseDirectory(array(
			__CORE_DIRECTORY__,
			__DIR__."/../app/",
			__DIR__."/src/bundles/",
		));
		
		
		autoLoader::setBaseDirectory(array(
			
		));
		
		class ZeroFramework extends core {
			 use 
				 traitedCore\serviceContainer,
				 traitedCore\Event
			 ;
		}
		
		// Initialise le core et le tranforme en class Dynamic
		$app = new ZeroFramework("dev", true);
		serviceContainer::addDirectoryService(__CORE_DIRECTORY__."/src/ZeroFrameworkExtendBundle/Service");
		serviceContainer::addDirectoryService(__DIR__."/../app/Service");

		
		/**
		 * Pour comprendre le calcul du chemin ou les resources sont chercher voici un schéma
		 * 
		 * AllBaseDirectory + "/" + BaseDirectory + __Namespace__ + __NomClasse__ + ".php"
		 */
		
		
		/*			
		$app
			->getServiceContainer()
			->addDirectoryService($app->getCoreDirectory()."/src/WebBundle/service")
			->addDirectoryService(__DIR__."/../app/service")
			->init();
		
		echo $app->getServiceContainer()->getService("test")->quisuisje();
		*/	
		$app->run();
		
	}
	catch (exception $e){
		header('Content-Type: text/html; charset=utf-8');

		echo $e->getMessage()."\r\n\r\n";
		echo $e->getTraceAsString();
	}
?>