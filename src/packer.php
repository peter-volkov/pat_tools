<?php

	if (php_sapi_name() != 'cli') {
	   echo $argv[0] . " could be launched in php-cli mode, from command line.";
	   die(-1);
	}


	if ($argc < 2) { 
	   echo "Usage: " . $argv[0] . " <folder> <archive_name>\n";
	   echo "\n";
	   echo "e.g. " . $argv[0] . " /home/www/mysite.com/php_antimalware_tool /home/www/mysite.com/pat.zip\n";

	   die(-2);
	}

    $root_dir = dirname($argv[0]);
    require_once($root_dir . '/' . "classes/Archiver.inc.php");

    $pat_dir = empty($argv[2]) ? '/home/www/badcode.tk/external/pat_tools/src/packer.php' : $argv[1];     
    $archive_filename = empty($argv[2]) ? 'pat.zip' : $argv[2];

    $archiver = new Archiver($archive_filename, "w");
    $archiver->add_dir($pat_dir);

?>