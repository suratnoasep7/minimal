<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('terbilang'))
{
	function terbilang($num) {
	  $digits = array(
		0 => "Nol",
		1 => "Satu",
		2 => "Dua",
		3 => "Tiga", 
		4 => "Empat",
		5 => "Lima",
		6 => "Enam",
		7 => "Tujuh",
		8 => "Delapan",
		9 => "Sembilan");
	  $orders = array(
		 0 => "",
		 1 => "Puluh",
		 2 => "Ratus",
		 3 => "Ribu",
		 6 => "Juta",
		 9 => "Miliar",
		12 => "Triliun",
		15 => "Kuadriliun");

	  $is_neg = $num < 0; $num = "$num";

	  //// angka di kiri desimal

	  $int = ""; if (preg_match("/^[+-]?(\d+)/", $num, $m)) $int = $m[1];
	  $mult = 0; $wint = "";

	  // ambil ribuan/jutaan/dst
	  while (preg_match('/(\d{1,3})$/', $int, $m)) {
		
		// ambil satuan, puluhan, dan ratusan
		$s = $m[1] % 10; 
		$p = ($m[1] % 100 - $s)/10;
		$r = ($m[1] - $p*10 - $s)/100;
		
		// konversi ratusan
		if ($r==0) $g = "";
		elseif ($r==1) $g = "se$orders[2]";
		else $g = $digits[$r]." $orders[2]";
		
		// konversi puluhan dan satuan
		if ($p==0) {
		  if ($s==0);
		  elseif ($s==1) $g = ($g ? "$g ".$digits[$s] :
									($mult==0 ? $digits[1] : "se"));
		  else $g = ($g ? "$g ":"") . $digits[$s];
		} elseif ($p==1) {
		  if ($s==0) $g = ($g ? "$g ":"") . "se$orders[1]";
		  elseif ($s==1) $g = ($g ? "$g ":"") . "Sebelas";
		  else $g = ($g ? "$g ":"") . $digits[$s] . " Belas";
		} else {
		  $g = ($g ? "$g ":"").$digits[$p]." Puluh".
			   ($s > 0 ? " ".$digits[$s] : "");
		}

		// gabungkan dengan hasil sebelumnya
		$wint = ($g ? $g.($g=="se" ? "":" ").$orders[$mult]:"").
				($wint ? " $wint":""); 
		
		// pangkas ribuan/jutaan/dsb yang sudah dikonversi
		$int = preg_replace('/\d{1,3}$/', '', $int);
		$mult+=3;
	  }
	  if (!$wint) $wint = $digits[0];
	  
	  //// angka di kanan desimal

	  $frac = ""; if (preg_match("/\.(\d+)/", $num, $m)) $frac = $m[1];
	  $wfrac = "";
	  for ($i=0; $i<strlen($frac); $i++) {
		$wfrac .= ($wfrac ? " ":"").$digits[substr($frac,$i,1)];
	  }
	  
	  return ($is_neg ? "minus ":"").$wint.($wfrac ? "koma $wfrac":"");
	}
}

/* End of file terbilang_helper.php */
/* Location: ./application/helpers/terbilang_helper.php */
