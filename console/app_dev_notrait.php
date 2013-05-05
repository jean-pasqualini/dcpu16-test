<?php
	try {
		include(__DIR__."/../../../core.php");
		
		define("__CORE_DIRECTORY__", core::__getCoreDirectory());
		define("__APP_DIRECTORY__", __DIR__."/../app/");
		
		include(__CORE_DIRECTORY__."/core.functions.php");
		include(__CORE_DIRECTORY__."/autoLoader.php");
		include(__CORE_DIRECTORY__."/Execption.php");
		
		// Charge toutes les librairies
		array_map(function($file) { include ($file); }, glob(__DIR__."/../../../lib/*.php"));
	
    
		// Enregistre l'autoloader
		$autoloader = autoLoader::register();

        $autoloader->append($finder = new Finder());

        $finder
        ->in(__CORE_DIRECTORY__)
        ->in(__DIR__."/../app/")
        ->in(__DIR__."/../src/bundles/")
        ->files()
        ;
							
		
        $app = EmptyClassDynamic::_fromClass(new core("dev", true));
		
        serviceContainer::addDirectoryService(__CORE_DIRECTORY__."/src/ZeroFrameworkExtendBundle/Service");
		serviceContainer::addDirectoryService(__DIR__."/../app/Service");
        
		// Initialise le core et le tranforme en class Dynamic
        hooks::init($app->getCoreDirectory()."/hooksCore")->load()->run($app);
        
		
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

		console::error($e->getMessage());
        echo "\r\n";
		echo $e->getTraceAsString();
	}
?>