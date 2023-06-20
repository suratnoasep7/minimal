<?php
error_reporting(E_ALL);
require('bca.php');
$user1   	= "irfan0115";
$pass1   	= "170688";
$rekening1	= "5150101095";
$parser 	= new IbParser();
$saldo1 	= $parser->getBalance( "BCA", $user1, $pass1);
$mutasi1 	= $parser->getTransactions("BCA", $user1, $pass1);
var_dump($mutasi1);
?>