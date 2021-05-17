<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <base href="{{ asset('backend/assets') }}">
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Nhóm 5</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo url('admin/get-race') ?>" class="simple-text">
                    Nhóm 5
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="<?php echo url('admin/get-track') ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Danh sách đường đua</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo url('admin/add-track') ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Thêm đường đua</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo url('admin/get-race') ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Danh sách cuộc thi</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo url('admin/add-race') ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Thêm cuộc thi</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo url('admin/get-member') ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Danh sách thành viên</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo url('admin/get-feedback') ?>">
                        <i class="pe-7s-graph"></i>
                        <p>Feedback</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo url('admin/get-race') ?>">@yield('back-crumb')</a>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="<?php echo url('admin/get-race') ?>">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
