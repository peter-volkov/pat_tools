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

    <link rel="stylesheet" href="static/css/analyzer.new.css" />

    <meta name="description" content="" />
</head>

<body class="page">
    <div class="body">

        <div class="body__content">
            <h2 class="header">{PS_ANALYZER_UPLOAD_FORM_HEADER}</h2>
            <p class="sub-header sub-header_align_left">{PS_ANALYZER_UPLOAD_FORM_TEXT}</p>
            <form name="uploadForm"  method="post" encType="multipart/form-data">
                <div class="form__file-load">
                    <div class="form__line form__line_type_report-file">
                        <div class="file i-bem" data-bem="{&quot;file&quot;:&quot;true&quot;}"><span class="button button_size_s file__button i-bem" data-bem="{&quot;button&quot;:{}}" role="button"><span class="button__text">{PS_UPLOAD_XML_REPORT}</span>
                            <input class="button__control file__control" type="file" name="report" />
                            </span><span class="file__holder file__holder_state_hidden"><span class="file__text">{PS_MESSAGE_NO_FILE_SELECTED}</span><span class="file__reset"></span></span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="a" value="show">
                <div class="form__buttonarea">
                    <button class="button button_theme_action i-bem" data-bem="{&quot;button&quot;:{}}" role="button">{PS_ANALYZE_BUTTON}</button>
                </div>
                </form>
        </div>
        <div class="body__spacer"></div>
        <div class="footer">
            <a class="b-link footer__item" href="#">{PS_ANALYZER_FOOTER_CONTACTS}</a>
            <a class="b-link footer__item" href="#">{PS_ANALYZER_FOOTER_HELP}</a>
            <div class="footer__item footer__item_type_copyright">{PS_ANALYZER_FOOTER_COPYRIGHT}</div>
        </div>
    </div>
    <script src="static/js/analyzer.new.js"></script>
</body>

</html>