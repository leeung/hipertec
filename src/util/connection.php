<?php

class Connection{
	
	private static $connection;
	
	public static function getConnection(){
		if(!isset(self::$connection)){
	
			try{
			
				self::$connection = new PDO('mysql:host=localhost;dbname=curriculum_hipertec', 'root', '',
						 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			}catch (PDOException $e){
				print $e->getMessage();
			}
			
		}

		return self::$connection;
	}	
	
}

