


<div class="restable">

<div>
<h2>{PS_FILELIST}</h2>
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
<script type="text/javascript" language="javascript" src="static/js/quarantine.js"></script>

<script language="javascript">

$(document).ready(function(){
    $('#report_table').dataTable({
       "aLengthMenu": [[100 , 500, -1], [100, 500, "All"]],
       "iDisplayLength": 500,
		"oLanguage": {
			"sLengthMenu": "Отображать по _MENU_ записей",
			"sZeroRecords": "Ничего не найдено",
			"sInfo": "Отображается c _START_ по _END_ из _TOTAL_ файлов",
			"sInfoEmpty": "Нет файлов",
			"sInfoFiltered": "(всего записей _MAX_)",
			"sSearch":       "Поиск:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst": "Первая",
				"sPrevious": "Предыдущая",
				"sNext": "Следующая",
				"sLast": "Последняя"
			},
			"oAria": {
				"sSortAscending":  ": активировать для сортировки столбца по возрастанию",
				"sSortDescending": ": активировать для сортировки столбцов по убыванию"			
			}
		},
       "aoColumns": [
                                     {"bSortable": true},
                                     {"iDataSort": 10},
                                     {"bSortable": true},
                                     {"iDataSort": 8},
                                     {"iDataSort": 9},
                                     {"bSortable": true},
                                     {"bSortable": true},
                                     {"bSortable": false},
                                     {"bVisible": false},
                                     {"bVisible": false},
                                     {"bVisible": false}
                     ]
     } );
});


</script>