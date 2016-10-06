<!DOCTYPE html>
<html lang="en-us" class="">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <base href="/resources/assets/xmgr/" />
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

    <title> Akademi Yazılım - Yönetim Paneli </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production-plugins.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">

    <!-- SmartAdmin RTL Support  -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css">

    <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- Specifying a Webpage Icon for Web Clip
         Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

</head>

<!--

TABLE OF CONTENTS.

Use search to find needed section.

===================================================================

|  01. #CSS Links                |  all CSS links and file paths  |
|  02. #FAVICONS                 |  Favicon links and file paths  |
|  03. #GOOGLE FONT              |  Google font link              |
|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
|  05. #BODY                     |  body tag                      |
|  06. #HEADER                   |  header tag                    |
|  07. #PROJECTS                 |  project lists                 |
|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
|  09. #MOBILE                   |  mobile view dropdown          |
|  10. #SEARCH                   |  search field                  |
|  11. #NAVIGATION               |  left panel & navigation       |
|  12. #RIGHT PANEL              |  right panel userlist          |
|  13. #MAIN PANEL               |  main panel                    |
|  14. #MAIN CONTENT             |  content holder                |
|  15. #PAGE FOOTER              |  page footer                   |
|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
|  17. #PLUGINS                  |  all scripts and plugins       |

===================================================================

-->

<!-- #BODY -->
<!-- Possible Classes

    * 'smart-style-{SKIN#}'
    * 'smart-rtl'         - Switch theme mode to RTL
    * 'menu-on-top'       - Switch to top navigation (no DOM change required)
    * 'no-menu'			  - Hides the menu completely
    * 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
    * 'fixed-header'      - Fixes the header
    * 'fixed-navigation'  - Fixes the main menu
    * 'fixed-ribbon'      - Fixes breadcrumb
    * 'fixed-page-footer' - Fixes footer
    * 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
-->
<body class="">

<!-- HEADER -->
<header id="header">
    <div id="logo-group">

        <!-- PLACE YOUR LOGO HERE -->
        <span id="logo" style="margin-top:0"> <img src="akademilogo.png" style="width:auto;height:50px" alt="Akademi Yazılım"> </span>
        <!-- END LOGO PLACEHOLDER -->
    </div>


    <!-- pulled right: nav area -->
    <div class="pull-right">

        <!-- collapse menu button -->
        <div id="hide-menu" class="btn-header pull-right">
            <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Menüyü Aç / Kapat"><i class="fa fa-reorder"></i></a> </span>
        </div>
        <!-- end collapse menu -->

        <!-- #MOBILE -->
        <!-- Top menu profile link : this shows only when top menu is active -->
        <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
            <li class="">
                <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">
                    <img src="akademilogo.png" alt="John Doe" class="online" />
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Ayarlar</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Tam <u>E</u>kran</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('admin-logout')  }}" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>Ç</u>ıkış</strong></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- logout button -->
        <div id="logout" class="btn-header transparent pull-right">
            <span> <a href="{{ route('admin-logout')  }}" title="Çıkış"><i class="fa fa-sign-out"></i></a> </span>
        </div>
        <!-- end logout button -->

        <!-- search mobile button (this is hidden till mobile view port) -->
        <div id="search-mobile" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0)" title="Ara..."><i class="fa fa-search"></i></a> </span>
        </div>
        <!-- end search mobile button -->

        <!-- input: search field -->
        <form action="" class="header-search pull-right">
            <input id="search-fld"  type="text" name="param" placeholder="Ara..." >
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
            <a href="javascript:void(0);" id="cancel-search-js" title="Aramayı iptal et"><i class="fa fa-times"></i></a>
        </form>
        <!-- end input: search field -->

        <!-- fullscreen button -->
        <div id="fullscreen" class="btn-header transparent pull-right">
            <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Tam Ekran"><i class="fa fa-arrows-alt"></i></a> </span>
        </div>
        <!-- end fullscreen button -->

    </div>
    <!-- end pulled right: nav area -->

</header>
<!-- END HEADER -->

<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
@include('xmgrx.layouts.leftPanel')
<!-- END NAVIGATION -->


@yield('panel_content')


<!-- PAGE FOOTER -->
<div class="page-footer">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <span class="txt-color-white">AkademiPanel <span class="hidden-xs"> - Akademi Yazılım</span> © {{ Date('Y') }}</span>
        </div>

    </div>
</div>
<!-- END PAGE FOOTER -->

<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
Note: These tiles are completely responsive,
you can add as many as you like
-->

<!-- END SHORTCUT AREA -->

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
    }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="js/plugin/fastclick/fastclick.min.js"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- Demo purpose only -->
<script src="js/demo.min.js"></script>

<!-- MAIN APP JS FILE -->
<script src="js/app.min.js"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="js/speech/voicecommand.min.js"></script>

<!-- SmartChat UI : plugin -->
<script src="js/smart-chat-ui/smart.chat.ui.min.js"></script>
<script src="js/smart-chat-ui/smart.chat.manager.min.js"></script>

<script src="js/plugin/jquery-nestable/jquery.nestable.min.js"></script>

<!-- PAGE RELATED PLUGIN(S) -->

<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<script src="js/plugin/flot/jquery.flot.cust.min.js"></script>
<script src="js/plugin/flot/jquery.flot.resize.min.js"></script>
<script src="js/plugin/flot/jquery.flot.time.min.js"></script>
<script src="js/plugin/flot/jquery.flot.tooltip.min.js"></script>

<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
<script src="js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Full Calendar -->
<script src="js/plugin/moment/moment.min.js"></script>
<script src="js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>

<script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<script src="js/plugin/bootstrapvalidator/bootstrapValidator.min.js"></script>
<script src="js/plugin/bootstrap-tags/bootstrap-tagsinput.min.js"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    function warning(link, content2) {
        content2 = typeof(content2) == 'undefined' ? 'Bu işlemi gerçekleştirmek istediğinize emin misiniz?' : content2;
        $.SmartMessageBox({
            title : "Uyarı",
            content : content2,
            buttons : '[Hayır][Evet]'
        }, function(ButtonPressed) {
            if (ButtonPressed === 'Evet') {
                window.location.href = link;
            }
            if (ButtonPressed === 'Hayır') {
                return false;
            }
        });
        e.preventDefault();
    }

    function statusChange(elem, ID, table) {
        console.log(elem.checked);
        $.post('{{ route("admin-status-change") }}', { status:elem.checked, table:table, id:ID});
    }

    function imageAdd(link, title) {
        var elem = $('#myModal');
        elem.find('h4').html(title);
        elem.find('form').attr('action', link);
    }



    $(document).ready(function() {

        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        pageSetUp();

    });

</script>

<!-- Your GOOGLE ANALYTICS CODE Below -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>


<!--
    * categories.blade
-->
@yield('footer_jscript')

</body>
</html>

