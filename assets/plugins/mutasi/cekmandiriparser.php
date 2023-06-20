<?php
error_reporting(E_ALL);
require('mandiriparser.php');
$user   	= "emoney6312";
$pass   	= "940729";
$kartu		= "6032-9810-3483-9571";
//$kartu		= "6032-9840-3163-6347";
$parser 	= new IbParser();
$hasil 		= $parser->getTransactions("MANDIRI", $user, $pass, $kartu);
if($hasil)
{
	preg_match_all('/<tr bgcolor="#DDF2FA">(.*?)<\/tr>/si', $hasil[0], $ganjil);
	preg_match_all('/<tr bgcolor="#F7FCFF">(.*?)<\/tr>/si', $hasil[0], $genap);
	foreach($ganjil[1] as $rowganjil){
			$str = preg_replace("/\n+/","|",trim($rowganjil));
			echo $str;
			echo "<br />";
	}
	foreach($genap[1] as $rowgenap){
			$strgenap = preg_replace("/\n+/","|",trim($rowgenap));
			echo $strgenap;
			echo "<br />";
	}
}
?>