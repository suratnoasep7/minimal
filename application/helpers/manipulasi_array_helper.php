<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('unique_multidim_array'))
{
	function unique_multidim_array($array, $key) {
		$temp_array = array(); 
		$i = 0; 
		$key_array = array(); 
		
		foreach($array as $val) { 
			if (!in_array($val[$key], $key_array)) { 
				$key_array[$i] = $val[$key]; 
				$temp_array[$i] = $val; 
			} 
			$i++; 
		} 
		return $temp_array;
	}
}	