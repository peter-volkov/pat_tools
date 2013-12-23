

<h2>File List</h2>

<a href="#execu">Go to recipe form</a>

<div class="restable">

<div class="critical">
<h2>Critical</h2>
  <table cellspacing=0 cellpadding=2 border=0>
  <tr align=left><th>Filename</th><th>Size</th><th>Created</th><th>Modified</th><th>Actions</th></tr>
  @@table_content_crit@@
  </table>
</div>


<div class="warning">
<h2>Warning</h2>
  <table cellspacing=0 cellpadding=2 border=0>
  <tr align=left><th>Filename</th><th>Size</th><th>Created</th><th>Modified</th><th>Actions</th></tr>
  @@table_content_warn@@
  </table>
</div>

<div class="other">
<h2>Others</h2>
  <table cellspacing=0 cellpadding=2 border=0>
  <tr align=left><th>Filename</th><th>Size</th><th>Created</th><th>Modified</th><th>Actions</th></tr>
  @@table_content@@
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
</script>