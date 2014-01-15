

<h2>File List</h2>

<a href="#execu">{PS_GO_TO_RECIPE}</a>

<div class="restable">

<div>
<h2>File List</h2>
  <table id="report_table" cellspacing=0 cellpadding=2 border=0>
<thead>
  <tr align=left><th>Flag</th><th>Filename</th><th>Size</th><th>Created</th><th>Modified</th><th>Actions</th></tr>
</thead>
<tbody>
  @@table_content@@
</tbody>
  </table>
</div>

<h2>Recipe</2>
<a name="execu"></a>
<div class="">
<form name="executor">
<textarea cols=60 rows=20 name="instruction"></textarea>
</div>

<h2>Environment</h2>
<div class="envtable">
<table cellspacing=0 cellpadding=2 border=0>
<tr align=left><th>Variable</th><th>Value</th></tr>
@@env_content@@
</tr>
</div>

</div>



<style type="text/css" title="currentStyle">
	@import "static/media/css/demo_page.css";
	@import "static/media/css/jquery.dataTables.css";
</style>
<script type="text/javascript" language="javascript" src="static/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="static/js/jquery.dataTables.js"></script>

<script language="javascript">
 var content = '';

 function add_instruction(str) {
    var f = document.forms.executor.instruction;

    content += "\n" + str;

    f.value = '<?xml version="1.0"?>' + content;
 }

 function add_quarantine(name) {
    add_instruction('<quarantine>' + name + '</quarantine>');
    return false;
 }

 function add_delete(name) {
    add_instruction('<delete>' + name + '</delete>');
    return false;
 }

$(document).ready(function(){
    $('#report_table').dataTable({
       "aLengthMenu": [[100 , 500, -1], [100, 500, "All"]],
       "iDisplayLength": 100
     } );
});

</script>