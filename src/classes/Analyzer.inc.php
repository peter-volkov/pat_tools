<?php

class Analyzer
{
    private $type = 0;
    private $wl_filenames;
    private $xml_filename;

    private $wl_files = array();

    private $server_info;
    private $report_file_list;

///////////////////////////////////////////////////////////////////////////////////////////////////////
function __construct($type, $xml_filename, $wl_filenames) {
  $this->type = $type;
  $this->wl_filenames = $wl_filenames;
  $this->xml_filename = $xml_filename;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
static function show_dom_nodes(DOMNode $domNode) {
    foreach ($domNode->childNodes as $node)
    {
        print $node->nodeName.':'.$node->nodeValue . "<hr>";
        if($node->hasChildNodes()) {
            $this->show_dom_nodes($node);
        }
    }    
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
function get_file_list() {
   return $this->report_file_list;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
function get_server_info() {
   return $this->server_info;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
function parse_xml() { 
  $doc = new DOMDocument();

  if (count($this->wl_filenames) > 0) {
     // parse whitelists
     foreach ($this->wl_filenames as $wl_filename) {
       $doc->load($wl_filename);
       $this->parse_wl($doc);
     }
  }

  // parse xml file
  $doc = new DOMDocument();
  $doc->load($this->xml_filename);
  
  $this->report_file_list = $this->parse_xml_filelist($doc);
  $this->server_info = $this->parse_server_info($doc);
  
}


///////////////////////////////////////////////////////////////////////////////////////////////////////
private function parse_xml_filelist($doc) {
  $files = array();

  $params = $doc->getElementsByTagName('file');
  foreach ($params as $file_info) {
     unset($f);

     foreach ($file_info->childNodes as $file) {
        if ($file->nodeName == '#text') continue;
        $f[$file->nodeName] = $file->nodeValue;
     }

     switch ($this->type) {
        case 0: 
          $key = $f['crc32b'];
          break;
        case 1: 
          $key = $f['path'] . $f['size'];
          break;
        case 2: 
          $key = $f['path'];
          break;
     }

     if (!isset($this->wl_files[$key])) {
        if ($file_info->hasAttribute('detected')) {
           $f['detected'] = $file_info->getAttribute('detected');
        }
        
        $files[] = $f;
     }
  }

  return $files;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
private function parse_server_info($doc) {
  $files = array();

  $env_containter = $doc->getElementsByTagName('server_environment');
  $env_containter = $env_containter->item(0);

  foreach ($env_containter->childNodes as $item)
  {
    $value = $item->nodeValue;
    $value = preg_replace('|<img.*?>|smiu', '', $value);
    $value = preg_replace('|<script.*?>|smiu', '', $value);
    $value = preg_replace('|<object.*?>|smiu', '', $value);
    $value = preg_replace('|<embed.*?>|smiu', '', $value);
    $value = preg_replace('|<h\d.*?>|smiu', '', $value);
    $value = preg_replace('|</h\d>|smiu', '', $value);
    $value = preg_replace('|<a.*?>|smiu', '', $value);
    $value = preg_replace('|</a>|smiu', '', $value);

    $server[$item->nodeName] = $value;
  }

  return $server;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
private function parse_wl($doc) {
  $files = array();

  $params = $doc->getElementsByTagName('file');
  foreach ($params as $file_info) {
     unset($f);

     foreach ($file_info->childNodes as $file) {
        if ($file->nodeName == '#text') continue;
        $f[$file->nodeName] = $file->nodeValue;
     }

     switch ($this->type) {
        case 0: 
          $key = $f['crc32b'];
          break;
        case 1: 
          $key = $f['path'] . $f['size'];
          break;
        case 2: 
          $key = $f['path'];
          break;
     }

     $files[$key] = $f;

  }

  $this->wl_files = array_merge($this->wl_files, $files);
}


} // end of class