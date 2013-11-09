<?php
/**
 * Project: ResponsiveAdSense.
 * User: Sabbacus
 * Date: 2013-11-02
 * Time: 14:07
 * To change this template use File | Settings | File Templates.
 */
require_once '../Classes/AutoLoader.php';
AutoLoader::setAutoLoaders();

$adSense 	= ResponsiveAdSense::init("ca-pub-3677047087164792", "4842057069");

// Only here for displaying valid HTML code.
$adSense->loadTemplate("HTML_Header.tpl.php");

$adSense->setAdElement();
// Printing your adsense
echo $adSense->output();

# Creating a second ad area using singleton pattern
$anotherAdSense = ResponsiveAdSense::init("ca-pub-3677047087164792", "4842057069");
$anotherAdSense->setAdElement();
// Printing your adsense
echo $adSense->output();

# Creating a third ad area using singleton pattern
$thirdSense = ResponsiveAdSense::init("ca-pub-3677047087164792", "4842057069");
$thirdSense->setAdElement();
// Printing your adsense
echo $adSense->output();

// Only here for displaying valid HTML code
$adSense->loadTemplate("HTML_Footer.tpl.php");

// Printing your adsense
echo $adSense->output();