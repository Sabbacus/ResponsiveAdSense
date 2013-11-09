<?php
/**
 * Setting one ad element and outputing it. The loadTemplate calls is only for valid HTML
 */
require_once '../Classes/AutoLoader.php';
AutoLoader::setAutoLoaders();

$adSense 	= ResponsiveAdSense::init("ca-pub-3677047087164792", "4842057069");

// Only here for displaying valid HTML code.
$adSense->loadTemplate("HTML_Header.tpl.php");

$adSense->setAdElement();

// Only here for displaying valid HTML code
$adSense->loadTemplate("HTML_Footer.tpl.php");

// Printing your adsense code
echo $adSense->output();