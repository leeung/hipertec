<?php

class FormatData{
	
	public static function dateToSql($data){
		
	}
	
	public static function dateToNormal($data){
	
		$dataStr = date_format(new DateTime($data), "d/m/Y");
		return $dataStr;
	
	}
	
	public static function dateToSql($data){
	
		$dataStr = date_format(new DateTime($data), "d-m-Y");
		return $dataStr;
	
	}
}