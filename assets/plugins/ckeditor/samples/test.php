<?php
$html = '<p><img alt="" src="http://naikbhinneka.com/dev/assets/contents/uploads/22be8ca.png" style="height:96px; width:96px" /></p>

';
$doc = new DOMDocument();
$doc->loadHTML($html); // loads your html
$xpath = new DOMXPath($doc);
$nodelist = $xpath->query("//img"); // find your image
$node = $nodelist->item(0); // gets the 1st image
$value = $node->attributes->getNamedItem('src')->nodeValue;
echo "$value\n"; // prints src of image
?>