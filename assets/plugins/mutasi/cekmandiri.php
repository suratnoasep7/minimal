<?php
error_reporting( E_ALL );
require('mandiri.php');
$parser 	= new bankMandiri();
$parser->login();
$hasil		= $parser->formemoney();
echo $hasil;
$parser->logout();
?>
