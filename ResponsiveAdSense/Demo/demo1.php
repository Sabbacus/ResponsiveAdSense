<?php
/**
 * Very simple usage using the __toString() method.
 */
#require_once '../config.php';
require_once '../Classes/AutoLoader.php';
AutoLoader::setAutoLoaders();

echo ResponsiveAdSense::init(RESPONSIVE_ADSENSE_ADCLIENT, RESPONSIVE_ADSENSE_ADSPOT);