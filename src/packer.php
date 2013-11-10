<?php
    require_once("classes/Archiver.inc.php");

    $pat_dir = "/home/www/badcode.tk/external/php_antimalware_tool/";     
    $archiver = new Archiver('php_antimalware_tool.zip', "a");
    $archiver->add_dir($pat_dir);

?>