<?php

class AppException extends Exception{
	
	function __construct($message, $code= 0, Exception $previous = null){
		parent::__construct($message, $code, $previous);
	}
	
	function error(){
		echo $this->getMessage();
	}
	
	function message(){
		echo $this->getMessage();
	}
	
}