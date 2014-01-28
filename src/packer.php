<?php
   require_once("classes/Localization.php");

	if (php_sapi_name() != 'cli') {
	   echo sprintf(PS_ERR_SCRIPT_WRONG_LAUNCH_MODE, $argv[0]);
	   die(-1);
	}


	if ($argc < 2) { 
	   $help =<<<HELP
Usage: %s <folder> <archive_name>
	   
e.g. %s /home/www/mysite.com/php_antimalware_tool /home/www/mysite.com/pat.zip
HELP;

           echo sprintf($help, $argv[0], $argv[0]);

	   die(-2);
	}

    $root_dir = dirname($argv[0]);
    require_once($root_dir . '/' . "classes/Archiver.inc.php");

    $pat_dir = empty($argv[2]) ? '/home/www/badcode.tk/external/pat_tools/src/packer.php' : $argv[1];     
    $archive_filename = empty($argv[2]) ? 'pat.zip' : $argv[2];

    $archiver = new Archiver($archive_filename, "w");
    $archiver->add_dir($pat_dir);

?>