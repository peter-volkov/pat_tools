<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////
// Whitelist Builder
//
// Greg Zemskov, ai@revisium.com
///////////////////////////////////////////////////////////////////////////////////////////////////////

require_once("classes/Localization.php");
require_once('classes/WhileListBuilder.inc.php');

if (php_sapi_name() != 'cli') {
   echo sprintf(PS_ERR_SCRIPT_WRONG_LAUNCH_MODE, $argv[0]);
   die(-1);
}


if ($argc < 2) { 
   $help =<<<HELP
Usage: %s <start folder> <filename>

e.g. wl_builder.php src wl_wordpress_3_6_1.xml
HELP;

   echo sprintf($help, $argv[0]);
   die(-2);
}


$wb_object = new WhiteListBuilder($argv[1], $argv[2]);
$wb_object->generate();

?>

