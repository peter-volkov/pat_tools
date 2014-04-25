<!DOCTYPE html>

<head>

    <meta charset="utf-8" />
    <title>{PS_ANALYZER_TITLE}</title>
    <link rel="stylesheet" href="static/css/analyzer.table.css" />
    <link rel="stylesheet" href="static/css/jquery.dataTables.css" />

</head>

<body class="page">
    <div class="body body_full_height">

        <div class="head head_position_relative">
            <h1 class="header header_type_main">{PS_ANALYZER_TABLE_HEADER}</h1>
            <h2 class="head__sub-header">{PS_FILELIST}</h2>
            <p class="head__description">{PS_ANALYZER_TABLE_HEADER_TEXT}</p>
        </div>

        <div class="filter i-bem" data-bem="{&quot;filter&quot;:&quot;true&quot;}">
        <button class="filter__flag">
          <span class="filter__text-flag">
            {PS_ANALYZER_TABLE_FLAG}
          </span>
          <span class="filter__arrow">
          </span>
        </button><div class="popup popup_name_flag popup_visibility_hidden i-bem" data-bem="{&quot;popup&quot;:{}}">
          <div class="popup__content">
            <ul class="list i-bem" data-bem="{&quot;list&quot;:&quot;true&quot;}">
              <li class="list__line list__line_checked_yes" val="green" num="1">
                <span class="list__check">
                </span>
                <span class="list__indicate list__indicate_color_green">
                </span>
                <span class="list__text">
                    {PS_ANALYZER_TABLE_FLAG_GREEN}
                </span>
              </li>
              <li class="list__line list__line_checked_yes" val="yellow" num="2">
                <span class="list__check">
                </span>
                <span class="list__indicate list__indicate_color_yellow">
                </span>
                <span class="list__text">
                    {PS_ANALYZER_TABLE_FLAG_YELLOW}
                </span>
              </li>
              <li class="list__line" val="red" num="3">
                <span class="list__check">
                </span>
                <span class="list__indicate list__indicate_color_red">
                </span>
                <span class="list__text">
                    {PS_ANALYZER_TABLE_FLAG_RED}
                </span>
              </li>
            </ul></div></div><input class="filter__file-name" id="fileNameSearchFilter" placeholder="{PS_ANALYZER_TABLE_FILE_PATH}"/><input class="filter__file-type" id="fileTypeFilter" placeholder="{PS_ANALYZER_TABLE_FILE_TYPE}"/><button class="filter__timeslot">
          <span class="filter__text-timeslot">
            {PS_ANALYZER_TABLE_TIMESLOT}
          </span>
          <span class="filter__arrow">
          </span>
        </button><div class="popup popup_name_timeslot popup_visibility_hidden i-bem" data-bem="{&quot;popup&quot;:{}}">
          <div class="popup__content">
            <div class="m-datepicker m-datepicker_type_month m-datepicker_disable_change i-bem" data-bem="{&quot;m-datepicker&quot;:&quot;true&quot;}">
            </div>
          </div>
        </div><button class="filter__filter-button filter__filter-button_theme_action">
            {PS_ANALYZER_TABLE_FILTER_BUTTON_NAME}
        </button>
      </div> 
        
        <table class="table" id="filesTable">
            <thead class="table__head">
                <th class="table__head-item table__head-item_type_flag"><span class="table__column-title">{PS_TH_FLAG}</span>
                </th>
                <th class="table__head-item table__head-item_type_Filename"><span class="table__column-title table__column-title_sort_up">{PS_TH_FILENAME}</span>
                </th>
                <th class="table__head-item table__head-item_type_Size"><span class="table__column-title table__column-title_sort_down">{PS_TH_SIZE}</span>
                </th>
                <th class="table__head-item table__head-item_type_Created"><span class="table__column-title">{PS_TH_CREATED}</span>
                </th>
                <th class="table__head-item table__head-item_type_Modified"><span class="table__column-title">{PS_TH_MODIFIED}</span>
                </th>
                <th class="table__head-item table__head-item_type_Created"><span class="table__column-title">{PS_TH_OWNER}</span>
                </th>
                <th class="table__head-item table__head-item_type_Modified"><span class="table__column-title">{PS_TH_GROUP}</span>
                </th>
                <th class="table__head-item table__head-item_type_button">{PS_TH_ACTION}</th>
            </thead>
            <tbody class="table__body">

                @@table_content@@

            </tbody>
        </table>

        <div class="body__content body__content_display_block">
            <p class="paragraph">{PS_RECIPE_RESULT_TEXT}</p>
                <form class="form" >
                <h3 class="form__head">{PS_RECIPE_RESULT_HEADER}</h3>
                <div class="form__textarea-wrapper">
                    <textarea class="form__textarea" id="recipeTextarea"></textarea>
                </div>

                 </form>

                <div class="form__buttonarea form__buttonarea_align_right">
                    <button class="button button_theme_action i-bem" data-bem="{&quot;button&quot;:{}}"  id='copyRecipeButton' role="button">{PS_COPY_TO_CLIPBOARD}</button>
                </div>
               
        </div>
        <div class="footer">
            <a class="b-link footer__item" href="#">{PS_ANALYZER_FOOTER_CONTACTS}</a>
            <a class="b-link footer__item" href="#">{PS_ANALYZER_FOOTER_HELP}</a>
            <div class="footer__item footer__item_type_copyright">{PS_ANALYZER_FOOTER_COPYRIGHT}</div>
        </div>

        </div>
    </div>


    <script type="text/javascript" language="javascript" src="static/js/HashTable.js"></script>
    <script type="text/javascript" language="javascript" src="static/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="static/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript" src="static/js/analyzer.table.js"></script>

    <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/zeroclipboard/1.3.5/ZeroClipboard.min.js"></script>

    <script type="text/javascript">

        var client = new ZeroClipboard( document.getElementById("copyRecipeButton"), {
          moviePath: "//cdnjs.cloudflare.com/ajax/libs/zeroclipboard/1.3.5/ZeroClipboard.swf"
        } );

        client.on( "load", function(client) {
          // alert( "movie is loaded" );

          client.on( 'dataRequested', function (client, args) {
              client.setText(document.getElementById('recipeTextarea').value);
          });

        } );

    </script>

    
    <script language="javascript">

    var filesDataTable = null;
    $(document).ready(function(){
        
        filesDataTable = $('#filesTable').dataTable({
           "aLengthMenu": [[100, 10, 500, -1], [100, 10, 500, "All"]],
           "iDisplayLength": 10,
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

            /*
           
           "aoColumns": [
                                         {"bSortable": true},
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
                         ]*/
         });

    });

    $('#fileNameSearchFilter').keyup(function(){filesDataTable.fnFilter($('#fileNameSearchFilter').val(), 1);}); 
    $('#fileTypeFilter').keyup(function(){filesDataTable.fnFilter($('#fileTypeFilter').val(), 2);}); 


    </script>



</body>

</html>