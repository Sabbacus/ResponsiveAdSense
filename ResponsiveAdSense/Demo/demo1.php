<?php
/**
 * Project: ResponsiveAdSense.
 * User: Sabbacus
 * Date: 2013-11-02
 * Time: 14:07
 * To change this template use File | Settings | File Templates.
 */
require_once '../Classes/AutoLoader.php';
spl_autoload_register('AutoLoader::register');

$adSense = new ResponsiveAdSense("ca-pub-3677047087164792", "4842057069");

$adSense->loadTemplate("HTML_Header.tpl.php");

$adSense->setAdElement('google-ads-1');
$adSense->loadTemplate("AdSense.tpl.php");

$adSense->loadTemplate("HTML_Footer.tpl.php");

echo $adSense->output();