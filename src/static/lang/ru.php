<?php

define('PS_UPLOAD_XML_REPORT', 'Загрузить отчет');
define('PS_UPLOAD_XML_WHITELIST', 'Выбрать whitelist');
define('PS_ANALYZE_BUTTON', 'АНАЛИЗИРОВАТЬ!');
define('PS_WHITELIST_BY', 'Фильтровать по');
define('PS_CRC', 'CRC');
define('PS_FILENAME_CRC', 'имени файла + размеру');
define('PS_FILENAME', 'имени файла');

define('PS_SCRIPT_HEADER', 'Analyzer v0.5');
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
