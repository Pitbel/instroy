<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Администрирование</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('admin/assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('admin/assets/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('admin/assets/css/demo.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin/assets/css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/leaflet-gesture-handling.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/leaflet.markercluster.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/leaflet.markercluster.default.css') }}">

    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('admin/assets/css/themify-icons.css') }}" rel="stylesheet">

    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            image_advtab: true,
            language_url : '/tinymce/lang/ru.js',
            language: 'ru',
            setup: function (editor) {
                editor.on('change', function (e) {
                    editor.save();
                });
            }
        });
    </script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ env('APP_URL') }}" class="simple-text">
                    {{ env('APP_NAME') }}
                </a>
            </div>

            <ul class="nav">
                <li {{ request()->route()->uri == 'admin/dashboard' ? 'class=active' : '' }}>
                    <a href="/admin/dashboard">
                        <i class="ti-panel"></i>
                        <p>Сводка</p>
                    </a>
                </li>
                <li {{ request()->route()->uri == 'admin/lands' ? 'class=active' : '' }}>
                    <a href="/admin/lands">
                        <i class="ti-layout"></i>
                        <p>Участки</p>
                    </a>
                </li>
                <li {{ request()->route()->uri == 'admin/news' ? 'class=active' : '' }}>
                    <a href="/admin/news">
                        <i class="fa fa-newspaper-o "></i>
                        <p>Новости</p>
                    </a>
                </li>
                <li {{ request()->route()->uri == 'admin/regions' ? 'class=active' : '' }}>
                    <a href="/admin/regions">
                        <i class="fa fa-tree"></i>
                        <p>Районы</p>
                    </a>
                </li>
                <li {{ request()->route()->uri == 'admin/localities' ? 'class=active' : '' }}>
                    <a href="/admin/localities">
                        <i class="fa fa-building-o"></i>
                        <p>Населенные пункты</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="/admin/dashboard">Админ-панель</a>
                </div>
            </div>
        </nav>


        <div class="content">
            @yield('content')
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="{{ asset('admin/assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('admin/assets/js/bootstrap-checkbox-radio.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('admin/assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('admin/assets/js/bootstrap-notify.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{ asset('admin/assets/js/paper-dashboard.js') }}"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('admin/assets/js/demo.js') }}"></script>

<script type="text/javascript">
    // Return welcome message depend on time of day
    function welcomeMessage(time) {
        var msg = '';

        if (time >= 4 && time < 11) {
            msg = 'Доброе утро';
        } else if(time >= 11 && time < 17) {
            msg = 'Добрый день';
        } else if(time >= 17 && time < 23) {
            msg = 'Добрый вечер';
        } else if(time >= 23 && time < 4) {
            msg = 'Доброй ночи';
        }

        return msg;
    }
</script>

@yield('scripts')

</html>
