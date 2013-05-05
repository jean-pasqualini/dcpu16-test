<?php
    namespace dcpuBundle;
    
    abstract class Location {
        
    	public static $storageLocations = array();
        
        public function getLocationFromStorageLocation(StorageLocation $value)
        {
            return Location::getStaticLocationFromStorageLocation($value);
        }
        
        public static function getStaticLocationFromStorageLocation(StorageLocation $value)
        {
            return array_search($value, Location::$storageLocations);
        }
        
    }
?>