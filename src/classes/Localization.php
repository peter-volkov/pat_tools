<?php

$lang = 'ru';
if ($lang == 'ru') {
    define('PS_TITLE_VIEW', 'Анализировать лог');
    define('PS_TITLE_COMPARE', 'Сравнить логи');
    define('PS_FILELIST', 'Список файлов');
    define('PS_UPLOAD_XML_REPORT', 'Загрузить отчет');
    define('PS_UPLOAD_XML_WHITELIST', 'Выбрать whitelist');
    define('PS_ANALYZE_BUTTON', 'Анализировать');
    define('PS_WHITELIST_BY', 'Фильтровать по');
    define('PS_COMPARE_BY', 'Сравнивать по');
    define('PS_FILESIZE', 'по размеру');
    define('PS_FILENAME_CRC', 'имени файла + размеру');
    define('PS_FILENAME', 'имени файла');
    define('PS_OWNER', 'владелецу');
    define('PS_CRC', 'хэшу');
    define('PS_MTIME', 'времени изменения');

    define('PS_CHANGED_FILES', 'Измененные файлы');
    define('PS_ADDED_FILES', 'Новые файлы');
    define('PS_DELETED_FILES', 'Удаленные файлы');

    define('PS_ANALYZER_TITLE', 'Анализатор логов');
    define('PS_ANALYZER_UPLOAD_FORM_HEADER', 'Загрузите лог для анализа');
    define('PS_ANALYZER_UPLOAD_FORM_TEXT', 'Лог создается при сканировании сайта инструментом и содержит информацию об окружении сайта (данные о вебсервере, интерпретаторе, системах контроля версий) а также файлах. Загружать лог можно как в виде архива, так и в виде распакованного xml.');

    define('PS_ANALYZER_FOOTER_CONTACTS', 'Обратная связь');
    define('PS_ANALYZER_FOOTER_HELP', 'Помощь');
    define('PS_ANALYZER_FOOTER_COPYRIGHT', '©&nbsp;2001&mdash;2013');

    define('PS_MESSAGE_NO_FILE_SELECTED', 'Файл лога не выбран');

    define('PS_GO_TO_RECIPE', 'Перейти к форме предписаний');
    define('PS_RECIPE_RESULT_HEADER', 'XML предписание');
    define('PS_ENVIRONMENT_HEADER', 'Переменные окружения');

    define('PS_ERR_UPLOADING_XML', 'Ошибка загрузки XML файла. Проверьте ваши настройки php (upload_max_filesize)');
    define('PS_ERR_BROKEN_XML', 'XML отчет поврежден');
    define('PS_ERR_ARCHIVE_OPENING', 'Ошибка открытия архива');
    define('PS_ERR_ARCHIVE_CREATION', 'Ошибка создания архива');
    define('PS_ERR_WRONG_ARCHIVE_MODE', 'Недопустимый режим архива. Возможные: r,w,a');
    define('PS_ERR_ARCHIVE_WRITE_INCORRECT_MODE', 'Ошибка записи. Архив был открыт для чтения');
    define('PS_ERR_NO_SUCH_FILE', 'Нет такого файла.');
    define('PS_ERR_TEMPLATE_DOESNT_EXISTS', 'Шаблон %s не найден.');
    define('PS_ERR_XML_VALIDATION_FAILED', 'В функции <b>DOMDocument::schemaValidate() возникла ошибка!</b>');
    define('PS_ERR_XML_VALIDATION_WARNING', '<b>Предупреждение %s</b>: ');
    define('PS_ERR_XML_VALIDATION_ERROR', '<b>Ошибка %s</b>: ');
    define('PS_ERR_XML_VALIDATION_FATAL_ERROR', '<b>Критическая ошибка %s</b>: ');
    define('PS_ERR_XML_FILE_SPEC', ' в <b>%s</b>');
    define('PS_ERR_XML_LINE_SPEC', ' в строке <b>%d</b>' . "\n");
    define('PS_ERR_SCRIPT_WRONG_LAUNCH_MODE', '%s could be launched in php-cli mode, from command line.'); // keep it in English for command line
    define('PS_ERR_UNPACK_ARCHIVE', 'Ошибка открытия архива');

    define('PS_TH_FLAG', 'Флаг');
    define('PS_TH_FILENAME', 'Имя файла');
    define('PS_TH_SIZE', 'Размер');
    define('PS_TH_CREATED', 'Создан');
    define('PS_TH_MODIFIED', 'Изменен');
    define('PS_TH_ACTION', 'Действие');
    define('PS_TH_VARIABLE', 'Переменная');
    define('PS_TH_VALUE', 'Значение');
    define('PS_TH_OWNER', 'Владелец');
    define('PS_TH_GROUP', 'Группа');

} else {
    //FIX eng constants
    define('PS_TITLE_VIEW', 'Analyze Log');
    define('PS_TITLE_COMPARE', 'Compare Log');
    define('PS_FILELIST', 'File list');
    define('PS_UPLOAD_XML_REPORT', 'Upload XML Report');
    define('PS_UPLOAD_XML_WHITELIST', 'Upload XML Whitelist');
    define('PS_ANALYZE_BUTTON', 'ANALYZE');
    define('PS_WHITELIST_BY', 'Whitelist by');
    define('PS_COMPARE_BY', 'Compare by');
    define('PS_CRC', 'CRC');
    define('PS_FILESIZE', 'Filesize');
    define('PS_FILENAME_CRC', 'Filename + Size');
    define('PS_FILENAME', 'Filename');
    define('PS_OWNER', 'Owner');
    define('PS_MTIME', 'Modification Time');

    define('PS_CHANGED_FILES', 'Changed files');
    define('PS_ADDED_FILES', 'Added files');
    define('PS_DELETED_FILES', 'Deleted files');

    define('PS_SCRIPT_HEADER', 'Analyzer v0.7');
    define('PS_GO_TO_RECIPE', 'Go to recipe form');
    define('PS_RECIPE_RESULT_HEADER', 'Result XML Recipe');
    define('PS_ENVIRONMENT_HEADER', 'Environment Variables');

    define('PS_ERR_UPLOADING_XML', 'Error in uploading xml report. Check your php settings (upload_max_filesize)');
    define('PS_ERR_BROKEN_XML', 'xml report is broken');
    define('PS_ERR_ARCHIVE_OPENING', 'Archive opening error');
    define('PS_ERR_ARCHIVE_CREATION', 'Archive creation/write error');
    define('PS_ERR_WRONG_ARCHIVE_MODE', 'Wrong archive mode. Available: r,w,a');
    define('PS_ERR_ARCHIVE_WRITE_INCORRECT_MODE', 'Write error: archive was opened for reading.');
    define('PS_ERR_NO_SUCH_FILE', 'no such file.');
    define('PS_ERR_TEMPLATE_DOESNT_EXISTS', 'Template %s does not exist.');
    define('PS_ERR_XML_VALIDATION_FAILED', '<b>DOMDocument::schemaValidate() errors occured!</b>');
    define('PS_ERR_XML_VALIDATION_WARNING', '<b>Warning %s</b>: ');
    define('PS_ERR_XML_VALIDATION_ERROR', '<b>Error %s</b>: ');
    define('PS_ERR_XML_VALIDATION_FATAL_ERROR', '<b>Fatal Error %s</b>: ');
    define('PS_ERR_XML_FILE_SPEC', ' in <b>%s</b>');
    define('PS_ERR_XML_LINE_SPEC', ' on line <b>%d</b>' . "\n");
    define('PS_ERR_SCRIPT_WRONG_LAUNCH_MODE', '%s could be launched in php-cli mode, from command line.');
    define('PS_ERR_UNPACK_ARCHIVE', 'Archive opening error');

    define('PS_TH_FLAG', 'Flag');
    define('PS_TH_FILENAME', 'Filename');
    define('PS_TH_SIZE', 'Size');
    define('PS_TH_CREATED', 'Created');
    define('PS_TH_MODIFIED', 'Modified');
    define('PS_TH_ACTION', 'Action');
    define('PS_TH_VARIABLE', 'Variable');
    define('PS_TH_VALUE', 'Value');
    define('PS_TH_OWNER', 'Owner');
    define('PS_TH_GROUP', 'Group');

}