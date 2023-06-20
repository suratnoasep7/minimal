<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('tanggal'))
{
	function tanggal($tgl)
	{
		if (($tgl!='') && (substr($tgl,0,2)!='00'))
		{
			$bulan = array(
				'Januari', 
				'Februari', 
				'Maret', 
				'April', 
				'Mei', 
				'Juni', 
				'Juli', 
				'Agustus', 
				'September', 
				'Oktober', 
				'November', 
				'Desember'
			);
			
			$thn = substr($tgl,0,4);
			$bln = $bulan[((substr($tgl,5,2) - 1) * 1)];
			$tgl = substr($tgl,8,2);
			
			return $tgl.' '.$bln.' '.$thn;
		}
	}   	function hari($tanggal)
	{
		if (($tanggal!='') && (substr($tanggal,0,2)!='00'))
		{			$extanggal	= explode("-",$tanggal);			$tgl = $extanggal[1].'/'.$extanggal[2].'/'.$extanggal[0];			$unix = strtotime($tgl);			$hari = date("D", $unix); // hasilnya 3 huruf nama hari bahasa inggris			# supaya harinya menjadi bahasa indonesia maka harus kita gant/replace			$hari = str_replace('Sun', 'Minggu', $hari);			$hari = str_replace('Mon', 'Senin', $hari);			$hari = str_replace('Tue', 'Selasa', $hari);			$hari = str_replace('Wed', 'Rabu', $hari);			$hari = str_replace('Thu', 'Kamis', $hari);			$hari = str_replace('Fri', 'Jumat', $hari);			$hari = str_replace('Sat', 'Sabtu', $hari);			return $hari;
}
}
}

if (!function_exists('jam'))
{
	function jam($tgl)
	{
		if ($tgl!='')
		{
			
			$tanggal=$tgl;
			
			$jam=substr(str_replace(' ','',$tanggal),10,2);
			$menit=substr(str_replace(' ','',$tanggal),12,3);
			
			return $jam.' : '.$menit;
		}
	}
}

if (!function_exists('jam_lengkap'))
{
	function jam_lengkap($tgl)
	{
		if ($tgl!='')
		{
			
			$tanggal=$tgl;
			
			$jam=substr(str_replace(' ','',$tanggal),10,2);
			$menit=substr(str_replace(' ','',$tanggal),12,3);
			$detik=substr(str_replace(' ','',$tanggal),15,3);
			return $jam.''.$menit.''.$detik;
		}
	}
}

if (!function_exists('bulan'))
{
	function bulan($tgl)
	{
		if ($tgl!='')
		{
			$bulan = array(
				'Januari', 
				'Februari', 
				'Maret', 
				'April', 
				'Mei', 
				'Juni', 
				'Juli', 
				'Agustus', 
				'September', 
				'Oktober', 
				'November', 
				'Desember'
			);
			
			$thn = substr($tgl,0,4);
			$bln = $bulan[((substr($tgl,5,2) - 1) * 1)];
			$tgl = substr($tgl,8,2);
			
			
			
			return $bln.' '.$thn;
		}
	}
}


if (!function_exists('hariIndo'))
{
	function hariIndo ($tgl) {
	
	$hari = date ("D",strtotime($tgl));
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
	return $hari_ini;
}
}


// if (!function_exists('tanggal_indo'))
// {
// function tanggal_indo($tanggal, $cetak_hari = false)
// {
// 	$hari = array ( 1 =>    'Senin',
// 				'Selasa',
// 				'Rabu',
// 				'Kamis',
// 				'Jumat',
// 				'Sabtu',
// 				'Minggu'
// 			);
			
// 	$bulan = array (1 =>   'Januari',
// 				'Februari',
// 				'Maret',
// 				'April',
// 				'Mei',
// 				'Juni',
// 				'Juli',
// 				'Agustus',
// 				'September',
// 				'Oktober',
// 				'November',
// 				'Desember'
// 			);
// 	$split 	  = explode('-', $tanggal);
// 	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
// 	if ($cetak_hari) {
// 		$num = date('N', strtotime($tanggal));
// 		return $hari[$num] . ', ' . $tgl_indo;
// 	}
// 	return $tgl_indo;
// }
// }

/* End of file tanggal_helper.php */
/* Location: ./application/helpers/tanggal_helper.php */
