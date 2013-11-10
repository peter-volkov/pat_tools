<?php

    function unpack_pat() {
		$archive_filename = 'pat.zip';
		$archive = new ZipArchive;
		$result = $archive->open($archive_filename);           
		if (!$result) die("Archive opening error");
		$archive->extractTo('php_antimalware_tool');
		$archive->close();
		unlink($archive_filename);
    }
   
    unpack_pat();

    header('Location: /php_antimalware_tool/scanner.php');
    unlink(__FILE__);

    

    
?>
 