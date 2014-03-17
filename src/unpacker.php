<?php

    define('PS_ERR_UNPACK_ARCHIVE', 'Ошибка при распаковке');
    define('PS_NO_ZIP_MODULE', 'Для работы нужен PHP модуль "zip".');

    $zipModuleVersion = phpversion('zip');
    if (empty($zipModuleVersion)) {
        die('PS_NO_ZIP_MODULE');
    } 

    function unpack_pat() {
		$archive_filename = 'pat.zip';
		$archive = new ZipArchive;
		$result = $archive->open($archive_filename);           
		if (!$result) die(PS_ERR_UNPACK_ARCHIVE);
		$archive->extractTo('pat');
		$archive->close();
		unlink($archive_filename);
    }
   
    unpack_pat();

    header('Location: /pat/index.php?controller=scanner');
    unlink(__FILE__);
  
?>
 