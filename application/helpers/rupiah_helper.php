<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('rupiah'))
{
	function rupiah($nilai) 
	{
		return number_format($nilai,0,',',',');
	}
}

if (!function_exists('rupiah2'))
{
	function rupiah2($nilai) 
	{
		return number_format($nilai,0,',','.');
	}
}

if (!function_exists('format_rupiah'))
{
	function format_rupiah($nilai)
	{
		return 'Rp.'.number_format($nilai,0,',','.');
	}
}

if (!function_exists('format_uang'))
{
	function format_uang($nilai) 
	{
		return number_format($nilai,0,'.',',');
	}
}

if (!function_exists('format_angka'))
{
	function format_angka($nilai)
	{
		return number_format($nilai,2,'.',',');
	}
}

if (!function_exists('angkaToHuruf'))
{
	function angkaToHuruf($angka)
	{
		$arAngka = str_split($angka);
		$alphabet = array( 'a', 'b', 'c', 'd', 'e',
                       'f', 'g', 'h', 'i', 'j',
                       'k', 'l', 'm', 'n', 'o',
                       'p', 'q', 'r', 's', 't',
                       'u', 'v', 'w', 'x', 'y',
                       'z'
                       );
		$rtn = "";
		foreach($arAngka as $isiArAngka){
			$rtn .= strtoupper($alphabet[$isiArAngka]);
		}

		return $rtn;
	}
}

/* End of file rupiah_helper.php */
/* Location: ./application/helpers/rupiah_helper.php */
