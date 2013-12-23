<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////
// File Analyzer
//
// Greg Zemskov, ai@revisium.com
///////////////////////////////////////////////////////////////////////////////////////////////////////

define('MAX_SUPPORTED_WLFILES', 5);

require_once("classes/Utils.inc.php");
require_once("classes/Template.inc.php");
require_once("classes/View.inc.php");
require_once("classes/Analyzer.inc.php");

///////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['a'])) {
   $wl_files = array();

   $type = (int)$_POST['filter'];

   $report = Utils::get_uploaded_file("report");
   for ($i = 1; $i <= MAX_SUPPORTED_WLFILES; $i++) {
     $wl = Utils::get_uploaded_file("wl" . $i);

     if ($wl != null) {
        $wlf[] = $wl;
     }
   }

   $analyzer = new Analyzer($type, $report, $wlf);
   $analyzer->parse_xml();

   $report_files = $analyzer->get_file_list();

   $templ = new Template("static/templates/analyzer_result.tpl");

   $table = '';
   $table_crit = '';
   $table_warn = '';

   $i = 0;

   $displayed = array();

   // critical only
   $row = new Template("static/templates/analyzer_table_row_crit.tpl");
   foreach ($report_files as $item) {
        if ($item['detected'] == 'c') {
           $row->prepare();
           $row->set('name', $item['path']);
           $row->set('snippet', $item['snippet']);
           $row->set('pos', $item['pos']);
           $row->set('size', $item['size']);
           $row->set('created', date('d/m/Y H:i:s', $item['ctime']));
           $row->set('modified', date('d/m/Y H:i:s', $item['mtime']));
           $row->set('evenodd', $i % 2);
	   $table_crit .= $row->get();

	   $i++;

           $displayed[] = $item['crc32'];
        } 
   }

   // warnings
   $row = new Template("static/templates/analyzer_table_row_warn.tpl");
   foreach ($report_files as $item) {
        if (($item['detected'] == 'w') && (!in_array($item['crc32'], $displayed))) {
           $row->prepare();
           $row->set('name', $item['path']);
           $row->set('size', $item['size']);
           $row->set('snippet', $item['snippet']);
           $row->set('pos', $item['pos']);
           $row->set('created', date('d/m/Y H:i:s', $item['ctime']));
           $row->set('modified', date('d/m/Y H:i:s', $item['mtime']));
           $row->set('evenodd', $i % 2);
	   $table_warn .= $row->get();

           $displayed[] = $item['crc32'];
	   $i++;
        } 
   }

   // others
   $row = new Template("static/templates/analyzer_table_row.tpl");
   foreach ($report_files as $item) {
        if (!in_array($item['crc32'], $displayed)) {
           $row->prepare();
           $row->set('name', $item['path']);
           $row->set('size', $item['size']);
           $row->set('created', date('d/m/Y H:i:s', $item['ctime']));
           $row->set('modified', date('d/m/Y H:i:s', $item['mtime']));
           $row->set('evenodd', $i % 2);
	   $table .= $row->get();

	   $i++;
        } 
   }

   $server_info = $analyzer->get_server_info();
   $env = '';

   $row = new Template("static/templates/analyzer_env_row.tpl");
   foreach ($server_info as $item_name => $item_value) {
      $row->prepare();
      $row->set('name', $item_name);
      $row->set('value', $item_value);
      $env .= $row->get();
   }

   $templ->set('table_content_crit', $table_crit);
   $templ->set('table_content_warn', $table_warn);
   $templ->set('table_content', $table);
   $templ->set('env_content', $env);

   $content = $templ->get();

} else {
   $templ = new Template("static/templates/analyzer_upload_form.tpl");
   $content = $templ->get();
}

template_output($content);

///////////////////////////////////////////////////////////////////////////////////////////////////////
function template_output($content) {
       $view = new View("/static/templates/");
       $view->set("title", "File Analyzer");
       $view->set("content", $content);
       $view->display("analyzer.tpl");
}

