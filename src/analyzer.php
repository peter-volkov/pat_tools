<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////
// File Analyzer
//
// Greg Zemskov, ai@revisium.com
///////////////////////////////////////////////////////////////////////////////////////////////////////

define('MAX_SUPPORTED_WLFILES', 5);

require_once("classes/Localization.php");
require_once("classes/Utils.inc.php");
require_once("classes/Template.inc.php");
require_once("classes/View.inc.php");
require_once("classes/Analyzer.inc.php");
require_once("classes/Comparator.inc.php");
require_once("classes/Archiver.inc.php");


function getAnalyzeLogView() {
   $wlf = array();
   $wl_files = array();

   $type = (int)$_POST['filter'];

   $report = getReportFile('report');

   for ($i = 1; $i <= MAX_SUPPORTED_WLFILES; $i++) {
     $wl = Utils::get_uploaded_file("wl" . $i);

     if ($wl != null) {
        $wlf[] = $wl;
     }
   }

   $analyzer = new Analyzer($type, $report, $wlf);
   $analyzer->parse_xml();

   $report_files = $analyzer->get_file_list();

   $templ = new Template("static/templates/analyzer.table.new.tpl");

   $table = '';
   $table_crit = '';
   $table_warn = '';

   $i = 0;

   $displayed = array();

   $row = new Template("static/templates/analyzer.table.row.new.tpl");
   $table_content = '';

   foreach ($report_files as $item) {
           if (isset($item['snippet'])) {
              $item['snippet'] = base64_decode($item['snippet']);
              $item['snippet'] = preg_replace('|@_MARKER_@|', '<font color=blue>^</font>', $item['snippet']);
           }  

           $row->prepare();
           $row->set('name', $item['path']);
           $row->set('snippet', @$item['snippet']);
           $row->set('pos', @$item['pos']);
           $row->set('size', $item['size'] > -1 ? $item['size'] : '[Folder]');
           $row->set('created', date('d/m/Y H:i:s', $item['ctime']));
           $row->set('modified', date('d/m/Y H:i:s', $item['mtime']));
           $row->set('ctime', $item['ctime']);
           $row->set('mtime', $item['mtime']);
           $row->set('sigid', @$item['sigid']);

    	   $flag = '';
           switch (@$item['detected']) {
               case 'c': $flag = '<span class="ico_critical">&#9763;</span>'; break;
               case 'w': $flag = '<span class="ico_warning">(!)</span>'; break;
           }

           $row->set('flagged', $flag);
           $row->set('uid', md5($item['path']));
           $row->set('group', $item['group'] != '' ? $item['group'] : '&mdash;');
           $row->set('owner', $item['owner'] != '' ? $item['owner'] : '&mdash;');
           $row->set('md5', $item['md5']);
	   $table_content .= $row->get();

	   $i++;

           $displayed[] = $item['md5'];

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

   $templ->set('table_content', $table_content);
   $templ->set('env_content', $env);

   return $templ->get();
}

function getCompareLogsView() {
        $type = (int)$_POST['filter'];
        switch ($type) {
           case 1:
             $compare_by = 'md5';
             break; 
           case 2:
             $compare_by = 'owner';
             break; 
           case 3:
             $compare_by = 'mtime';
             break; 
           default:
             $compare_by = 'size';
        }

        $report1 = getReportFile('report1');
        $report2 = getReportFile('report2');
        $comparator = new Comparator($report1, $report2, $compare_by);
        $diff = $comparator->getDiff();

        $templ = new Template("static/templates/comparator_result.tpl");
        $loop = array('m', 'd', 'a');

        $row = new Template("static/templates/comparator_table_row.tpl");

        foreach($loop as $index) {
           $table_content = '';
           if (!isset($diff[$index])) continue;

           foreach ($diff[$index] as $item) {
                if (isset($item['snippet'])) {
                   $item['snippet'] = base64_decode($item['snippet']);
                   $item['snippet'] = preg_replace('|@_MARKER_@|', '<font color=blue>^</font>', $item['snippet']);
                }  

                $row->prepare();
                $row->set('name', $item['path']);
                $row->set('snippet', @$item['snippet']);
                $row->set('pos', @$item['pos']);
                $row->set('size', $item['size'] > -1 ? $item['size'] : '[Folder]');
                $row->set('created', date('d/m/Y H:i:s', $item['ctime']));
                $row->set('modified', date('d/m/Y H:i:s', $item['mtime']));
                $row->set('ctime', $item['ctime']);
                $row->set('mtime', $item['mtime']);
                $row->set('sigid', @$item['sigid']);

     	        $flag = '';
                switch (@$item['detected']) {
                    case 'c': $flag = '<span class="ico_critical">&#9763;</span>'; break;
                    case 'w': $flag = '<span class="ico_warning">(!)</span>'; break;
                }

                $row->set('flagged', $flag);
                $row->set('uid', md5($item['path']));
                $row->set('group', $item['group'] != '' ? $item['group'] : '&mdash;');
                $row->set('owner', $item['owner'] != '' ? $item['owner'] : '&mdash;');
                $row->set('md5', $item['md5']);
     	        $table_content .= $row->get();
           }

           $templ->set('table_content_' . $index, $table_content);
        }

        foreach($loop as $index) {
          $templ->set('table_content_' . $index, '');
        }
    
        return $templ->get();
}

function getReportFile($var) {
   $new_report = Utils::get_uploaded_file($var);

   if ($tmp_fh = fopen($new_report, "r")) {
      $sig = fread($tmp_fh, 2);
      if ($sig == 'PK') {
         $archiver = new Archiver($new_report, "r");
         $folder = $archiver->extract_files();
         $old_report = $folder . '/' . 'scan_log.xml';
         $new_report = $folder . '/' . 'scan_log.' . rand(1000, 9999) . '.xml';
         rename($old_report, $new_report);

         $archiver->close();
      }

      fclose($tmp_fh);
   }

   return $new_report;
}

function template_output($content, $template="analyzer.tpl") {
       $view = new View("/static/templates/");
       $view->set("title", "File Analyzer");
       $view->set("content", $content);
       $view->display($template);
}

function showView($template) {
       $view = new View("/static/templates/");
       $view->display($template);
}


$content = "";
if (isset($_POST['a']) && $_POST['a'] == 'show') {
    $content = getAnalyzeLogView();
    print($content);
} else if (isset($_POST['a']) && $_POST['a'] == 'compare') {
    $content = getCompareLogsView();
    template_output($content);
} else {
    $view = new Template("static/templates/analyzer.upload.new.tpl");
    print($view->get());
    #showView('analyzer.upload.new.tpl');

}





