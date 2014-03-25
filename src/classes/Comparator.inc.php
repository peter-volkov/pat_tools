<?php
require_once("XmlValidator.inc.php");

class Comparator
{
    private $report1;
    private $report2;
    private $compare_key;

///////////////////////////////////////////////////////////////////////////////////////////////////////
function __construct($report_file1, $report_file2, $type = 'md5') {
  $this->compare_key = $type;
  $this->report1 = $this->parse_xml($report_file1);
  $this->report2 = $this->parse_xml($report_file2);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
function parse_xml($filename) { 
  $doc = new DOMDocument();

  // parse xml file
  $validator = new XmlValidator();
  if (!$validator->validate(implode('', file($filename)), 'static/xsd/report.xsd')) {
        echo "<br>";
  	die(PS_ERR_BROKEN_XML);
  }


  $doc = new DOMDocument();
  $doc->load($filename);
  
  return $this->parse_xml_filelist($doc);
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

     $files[$f['path']] = $f;
  }

  return $files;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
function getDiff() {
   $result = array();
   $second_keys = array_keys($this->report2);
   for ($i = 0; $i < count($second_keys); $i++)  
   {
      $item = $second_keys[$i];

      // modified?
      if (isset($this->report1[$item])) { 
         if ($this->report1[$item][$this->compare_key] != $this->report2[$item][$this->compare_key]) {
            $result['m'][] = $this->report1[$item];
         }

         unset($this->report1[$item]);
         unset($this->report2[$item]);
      }
   }

   // deleted
   foreach ($this->report1 as $item) {
      $result['d'][] = $item;
   }

   // added
   foreach ($this->report2 as $item) {
      $result['a'][] = $item;
   }

   return $result;

}   

 
} // end of class