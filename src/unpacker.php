<?php

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
 