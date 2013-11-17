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
   $i = 0;

   $row = new Template("static/templates/analyzer_table_row.tpl");
   foreach ($report_files as $item) {
        $row->prepare();
        $row->set('name', $item['path']);
        $row->set('size', $item['size']);
        $row->set('created', date('d/m/Y H:i:s', $item['ctime']));
        $row->set('modified', date('d/m/Y H:i:s', $item['mtime']));
        $row->set('evenodd', $i % 2);
	$table .= $row->get();

	$i++;
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

