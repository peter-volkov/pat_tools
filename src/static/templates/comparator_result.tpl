


<div class="restable">

<div>
<h2>{PS_CHANGED_FILES}</h2>

<table id="report_table_m" cellspacing=0 cellpadding=2 border=0>
<thead>
  <tr align=left><th>{PS_TH_FLAG}</th><th>{PS_TH_FILENAME}</th><th>{PS_TH_SIZE}</th><th>{PS_TH_CREATED}</th><th>{PS_TH_MODIFIED}</th><th>{PS_TH_OWNER}</th><th>{PS_TH_GROUP}</th><th>{PS_TH_ACTION}</th></tr>
</thead>
<tbody>
  @@table_content_m@@
</tbody>
  </table>
</div>

<h2>{PS_ADDED_FILES}</h2>

<table id="report_table_a" cellspacing=0 cellpadding=2 border=0>
<thead>
  <tr align=left><th>{PS_TH_FLAG}</th><th>{PS_TH_FILENAME}</th><th>{PS_TH_SIZE}</th><th>{PS_TH_CREATED}</th><th>{PS_TH_MODIFIED}</th><th>{PS_TH_OWNER}</th><th>{PS_TH_GROUP}</th><th>{PS_TH_ACTION}</th></tr>
</thead>
<tbody>
  @@table_content_a@@
</tbody>
  </table>
</div>

<h2>{PS_DELETED_FILES}</h2>

<table id="report_table_d" cellspacing=0 cellpadding=2 border=0>
<thead>
  <tr align=left><th>{PS_TH_FLAG}</th><th>{PS_TH_FILENAME}</th><th>{PS_TH_SIZE}</th><th>{PS_TH_CREATED}</th><th>{PS_TH_MODIFIED}</th><th>{PS_TH_OWNER}</th><th>{PS_TH_GROUP}</th><th>{PS_TH_ACTION}</th></tr>
</thead>
<tbody>
  @@table_content_d@@
</tbody>
  </table>
</div>

<style type="text/css" title="currentStyle">
	@import "static/media/css/demo_page.css";
	@import "static/media/css/jquery.dataTables.css";
</style>


<script type="text/javascript" language="javascript" src="static/js/HashTable.js"></script>
<script type="text/javascript" language="javascript" src="static/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="static/js/jquery.dataTables.js"></script>

<script language="javascript">

$(document).ready(function(){
    $('#report_table_m').dataTable({
       "aLengthMenu": [[100 , 500, -1], [100, 500, "All"]],
       "iDisplayLength": 100
     } );
    $('#report_table_d').dataTable({
       "aLengthMenu": [[100 , 500, -1], [100, 500, "All"]],
       "iDisplayLength": 100
     } );
    $('#report_table_a').dataTable({
       "aLengthMenu": [[100 , 500, -1], [100, 500, "All"]],
       "iDisplayLength": 100
     } );
});

</script>