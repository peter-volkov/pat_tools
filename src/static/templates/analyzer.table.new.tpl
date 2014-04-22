<!DOCTYPE html>
<html class="ua_js_no">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8" />
    <title>{PS_ANALYZER_TITLE}</title>
    <script>
        (function (e, c) {
            e[c] = e[c].replace(/(ua_js_)no/g, "$1yes");
        })(document.documentElement, "className");
    </script>

    <link rel="stylesheet" href="static/css/analyzer.table.css" />

    <meta name="description" content="" />

</head>

<body class="page">
    <div class="body body_full_height">
        <div class="head head_position_relative">
            <h1 class="header header_type_main">Report Analyzer PHP Antimalware Tool</h1>
            <div class="head__uninstall">
                <button class="button button_size_s i-bem" data-bem="{&quot;button&quot;:{}}" role="button">Uninstall tool</button>
            </div>
            <h2 class="head__sub-header">{PS_FILELIST}</h2>
            <p class="head__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="filter i-bem" data-bem="{&quot;filter&quot;:&quot;true&quot;}">
            <button class="filter__flag"><span class="filter__text-flag">Flag</span><span class="filter__arrow"></span>
            </button>
            <div class="popup popup_name_flag popup_visibility_hidden i-bem" data-bem="{&quot;popup&quot;:{}}">
                <div class="popup__content">
                    <ul class="list i-bem" data-bem="{&quot;list&quot;:&quot;true&quot;}">
                        <li class="list__line list__line_checked_yes" val="green" num="1"><span class="list__check"></span><span class="list__indicate list__indicate_color_green"></span><span class="list__text">Статус 1</span>
                        </li>
                        <li class="list__line list__line_checked_yes" val="yellow" num="2"><span class="list__check"></span><span class="list__indicate list__indicate_color_yellow"></span><span class="list__text">Статус 2</span>
                        </li>
                        <li class="list__line" val="red" num="3"><span class="list__check"></span><span class="list__indicate list__indicate_color_red"></span><span class="list__text">Статус 3</span>
                        </li>
                    </ul>
                </div>
            </div>
            <input class="filter__file-name" placeholder="File name or path" />
            <input class="filter__file-type" placeholder="File type" />
            <button class="filter__timeslot"><span class="filter__text-timeslot">Timeslot</span><span class="filter__arrow"></span>
            </button>
            <div class="popup popup_name_timeslot popup_visibility_hidden i-bem" data-bem="{&quot;popup&quot;:{}}">
                <div class="popup__content">
                    <div class="m-datepicker m-datepicker_type_month m-datepicker_disable_change i-bem" data-bem="{&quot;m-datepicker&quot;:&quot;true&quot;}"></div>
                </div>
            </div>
            <button class="filter__filter-button filter__filter-button_theme_action">Filter</button>
        </div>
        <table class="table">
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
            <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <form class="form">
                <h3 class="form__head">{PS_RECIPE_RESULT_HEADER}</h3>
                <div class="form__textarea-wrapper">
                    <textarea class="form__textarea" id="instr"></textarea>
                </div>
                <div class="form__buttonarea form__buttonarea_align_right">
                    <button class="button button_theme_action i-bem" data-bem="{&quot;button&quot;:{}}" role="button">Copy to Clipboard</button>
                </div>
                </form>
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
    <script type="text/javascript" language="javascript" src="static/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="static/js/quarantine.js"></script>
    <script src="static/js/analyzer.table.new.js"></script>

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


</body>

</html>