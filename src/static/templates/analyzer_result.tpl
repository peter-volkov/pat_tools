


<div class="restable">

<div>
<h2>File List</h2>
<a href="#execu">{PS_GO_TO_RECIPE}</a>


  <table id="report_table" cellspacing=0 cellpadding=2 border=0>
<thead>
  <tr align=left><th>{PS_TH_FLAG}</th><th>{PS_TH_FILENAME}</th><th>{PS_TH_SIZE}</th><th>{PS_TH_CREATED}</th><th>{PS_TH_MODIFIED}</th><th>{PS_TH_OWNER}</th><th>{PS_TH_GROUP}</th><th>{PS_TH_ACTION}</th></tr>
</thead>
<tbody>
  @@table_content@@
</tbody>
  </table>
</div>

<h2>{PS_RECIPE_RESULT_HEADER}</2>
<a name="execu"></a>
<div class="">
<form name="executor">
<textarea cols=60 id="instr" rows=20 name="instruction"></textarea>
</form>
</div>

<h2>{PS_ENVIRONMENT_HEADER}</h2>
<div class="envtable">
<table cellspacing=0 cellpadding=2 border=0>
<tr align=left><th>{PS_TH_VARIABLE}</th><th>{PS_TH_VALUE}</th></tr>
@@env_content@@
</tr>
</div>

</div>



<style type="text/css" title="currentStyle">
	@import "static/media/css/demo_page.css";
	@import "static/media/css/jquery.dataTables.css";
</style>


<script type="text/javascript" language="javascript" src="static/js/HashTable.js"></script>
<script type="text/javascript" language="javascript" src="static/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="static/js/jquery.dataTables.js"></script>

<script language="javascript">
 var deleted = new HashTable({});
 var quarantened = new HashTable({}); 

 function renderXml() {
    var f = document.forms.executor.instruction;

    var content = '<?xml version="1.0"?><recipe>';

    quarantened.each(function(key, value) {
        content += '<quarantine>' + value + '</quarantine>';
    });

    deleted.each(function(key, value) {
        content += '<delete>' + value + '</delete>';
    });

    f.value = content + "</recipe>";
 }

 function triggerLink(id, state) {
    var obj = document.getElementById(id);
    if (obj) {
       if (state) {
          obj.style.fontWeight = 'bold';
          obj.style.textDecoration = 'line-through';
       } else {
          obj.style.fontWeight = 'normal';
          obj.style.textDecoration = '';
       }
    }
 }

 function add_quarantine(uid, name) {
    if (quarantened.hasItem(uid))  {
       triggerLink('q_' + uid, false);
       quarantened.removeItem(uid);
    } else {
       triggerLink('q_' + uid, true);
       quarantened.setItem(uid, name);
    }

    renderXml();

    return false;
 }

 function add_delete(uid, name) {
    if (deleted.hasItem(uid))  {
       triggerLink('d_' + uid, false);
       deleted.removeItem(uid);
    } else {
       triggerLink('d_' + uid, true);
       deleted.setItem(uid, name);
    }

    renderXml();

    return false;
 }

$(document).ready(function(){
    $('#report_table').dataTable({
       "aLengthMenu": [[100 , 500, -1], [100, 500, "All"]],
       "iDisplayLength": 100
     } );
});

</script>