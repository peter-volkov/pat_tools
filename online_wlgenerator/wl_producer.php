<?php

$tmp_dir = './tmp';
$unzip_folder = '/unzipped';

set_time_limit(0);
ini_set('max_execution_time', '90000');
ini_set('memory_limit','256M');

function delete_dir($src) { 
    if (!file_exists($src))
       return;

    $dir = opendir($src);
    while(false != ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                delete_dir($src . '/' . $file); 
            } 
            else { 
                unlink($src . '/' . $file); 
            } 
        } 
    } 

    rmdir($src);
    closedir($dir); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   try {
   
       // You should check filesize here. 
       if ($_FILES['upfile']['size'] > 20000000) {
           throw new RuntimeException('Exceeded filesize limit.');
       }

       $target_file = $_FILES['upfile']['name'];
       mkdir($tmp_dir . $unzip_folder);
       $full_path = $tmp_dir . '/' . $target_file;

       if (!move_uploaded_file( $_FILES['upfile']['tmp_name'], $full_path )) {
           throw new RuntimeException('Failed to move uploaded file.');
       }

       echo 'File is uploaded successfully.<br>';

       $zip = new ZipArchive();
       if ($zip->open( $full_path ) === TRUE) {
           $zip->extractTo( $tmp_dir . $unzip_folder);
           $zip->close();
           echo 'Archive successully unpacked.<br>';
       } else {
           echo 'Error during archive processing.<br>';
       }

       include_once('WhileListBuilder.inc.php');

       $relative_path = '';
       switch ($_POST['cms']) {
          case 'joomla': $relative_path = ''; break;
          case 'wp': $relative_path = '/wordpress'; break;
          case 'dle': $relative_path = '/upload'; break;
       }

       $full_outfile = $tmp_dir . '/' . $_POST['outfile'] . '.xml';

       $wb_object = new WhiteListBuilder($tmp_dir . $unzip_folder . $relative_path, $full_outfile);
       $wb_object->generate();

       echo 'White list has been generated. <a href="' . $full_outfile . '">Download</a><br>';

       delete_dir($tmp_dir . $unzip_folder);
       unlink($full_path);

   } catch (RuntimeException $e) {

       echo $e->getMessage();

   }
}
?>

<html>
<head>
<title>Whitelist File Upload</title>
</head>

<body>
<h1>Whitelist Producer</h1>
<form method="post" enctype="multipart/form-data">
  <label for="file">CMS Distributive (.zip):</label>  <input type="file" name="upfile"><br>
  <label for="file">CMS Type:</label>  <select name="cms"><option value="joomla">Joomla</option><option value="wp">Wordpress</option><option value="dle">DLE</option><option value="others">Others</option></select>
  <label for="file">Output Filename:</label>  <input type="text" name="outfile" size=40>
  <input type="submit" name="submit" value="Generate Whitelist!">
</form>

</body>
</html>
