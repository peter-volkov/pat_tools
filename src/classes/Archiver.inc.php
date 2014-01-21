<?php

#ZipArchive requies PHP above 5.2
class Archiver
{
    private $filename = "";
    private $mode = "";
    private $archive = NULL;
    private $sys_folder = "";

    
	public function __construct($filename, $mode="r")
	{
        $this->filename = $filename;
        $this->mode = $mode;
        $result = false;

        $archive = new ZipArchive;

        if ($this->mode === "r") {
            $result = $archive->open($this->filename);           
            if (!$result) die(PS_ERR_ARCHIVE_OPENING);
        } else if ($this->mode === "w" || $this->mode === "a") {
            $result = $archive->open($this->filename, ZipArchive::CREATE);
            if (!$result) die(PS_ERR_ARCHIVE_CREATION);
        } else { 
            die(PS_ERR_WRONG_ARCHIVE_MODE);
        }
 
        $this->archive = $archive;
        $this->sys_folder = sys_get_temp_dir();
		
	}

    public function add_file($filename, $target_filename=NULL) {         
        if ($this->mode === "r") die(PS_ERR_ARCHIVE_WRITE_INCORRECT_MODE);
        if (!$target_filename) {
            $this->archive->addFile($filename);
        } else {
            $this->archive->addFile($filename, $target_filename);
        }
    }

    private function dir_traverse($path, $root='') {
        if ($root == '') {
            $root = $path;
        }
	    if ($dir = opendir($path)) {
	        while($file = readdir($dir)) {
				if ($file[0] == '.' || is_link($file)) continue;

				$name = $file;
				$file_path = $path . '/' . $file;

				if (is_dir($file_path))  {
                    $dir_path = $file_path;
					$this->dir_traverse($dir_path, $root);
				} else {
                    $relative_path = str_replace($root, '', $file_path);
					$this->add_file($file_path, $relative_path);    
				}
		    }  
    		closedir($dir);
     	}
    }


    public function add_dir($path) {
        $this->dir_traverse($path);                 		
    }


    public function create_file($filename, $str) {
        $this->archive->addFromString($filename, $str);
    }    

    public function close() {
        $this->archive->close();  
    }

    public function extract_files() {
        $this->archive->extractTo($this->sys_folder);
        return $this->sys_folder;
    }
    
}