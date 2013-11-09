<?php
/**
	Presenting several ads throughout the page.
 */
require_once '../Classes/AutoLoader.php';
AutoLoader::setAutoLoaders();

$adSense 	= ResponsiveAdSense::init("ca-pub-3677047087164792", "4842057069");

// Only here for displaying valid HTML code
$adSense->loadTemplate("HTML_Header.tpl.php");

$adSense->setAdElement();
#$adSense->loadTemplate();

$anotherAdSense = ResponsiveAdSense::init("ca-pub-3677047087164792", "4842057069");
$anotherAdSense->setAdElement();
#$anotherAdSense->loadTemplate();

$thirdSense = ResponsiveAdSense::init("ca-pub-3677047087164792", "4842057069");
$thirdSense->setAdElement();
#$thirdSense->loadTemplate();

// Only here for displaying valid HTML code
$adSense->loadTemplate("HTML_Footer.tpl.php");

echo $adSense->output();