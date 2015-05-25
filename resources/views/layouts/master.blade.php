<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>@yield('title', 'Administration Dashboard')</title>
        <link rel="shortcut icon" href="{!! asset('favicon.ico') !!}" />        
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        @yield('meta')
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        {!! HTML::style(asset('plugins/bootstrap/css/bootstrap.min.css')) !!}
        {!! HTML::style(asset('plugins/font-awesome/css/font-awesome.min.css')) !!}
        {!! HTML::style(asset('fonts/style.css')) !!}
        {!! HTML::style(asset('css/main.css')) !!}
        {!! HTML::style(asset('css/main-responsive.css')) !!}
        {!! HTML::style(asset('plugins/iCheck/skins/all.css')) !!}
        {!! HTML::style(asset('plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css')) !!}
        {!! HTML::style(asset('plugins/perfect-scrollbar/src/perfect-scrollbar.css')) !!}
        {!! HTML::style(asset('css/theme_light.css'), array('id' => 'skin_color')) !!}
        {!! HTML::style(asset('css/print.css'), array('media' => 'print')) !!}
        <!--[if IE 7]>
        {!! HTML::style(asset('plugins/font-awesome/css/font-awesome-ie7.min.css')) !!}
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        @yield('styles')
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body>
        <!-- start: HEADER -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <!-- start: TOP NAVIGATION CONTAINER -->
            <div class="container">
                <div class="navbar-header">
                    <!-- start: RESPONSIVE MENU TOGGLER -->
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="clip-list-2"></span>
                    </button>
                    <!-- end: RESPONSIVE MENU TOGGLER -->
                    <!-- start: LOGO -->
                    <a class="navbar-brand" href="#">
                        SSHAM v2
                    </a>
                    <!-- end: LOGO -->
                </div>
                <div class="navbar-tools">
                    <!-- start: TOP NAVIGATION MENU -->
                    <ul class="nav navbar-right">
                        <!-- start: NOTIFICATION DROPDOWN -->
                        
                        <!-- end: NOTIFICATION DROPDOWN -->
                        <!-- start: USER DROPDOWN -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/auth/login') }}">{!! Lang::get('auth.login') !!}</a></li>
                        @else
                        <li class="dropdown current-user">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                                {{-- HTML::image('gg', null, array('class' => 'circle-img', 'height' => '30', 'width' => '30')) --}}
                                <span class="username">{{ Auth::user()->name }}</span>
                                <i class="clip-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        <i class="clip-exit"></i>
                                        &nbsp;{!! Lang::get('auth.logout') !!}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <!-- end: USER DROPDOWN -->
                    </ul>
                    <!-- end: TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- end: TOP NAVIGATION CONTAINER -->
            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                                {{--<li>
                                    <i class="clip-home-3"></i>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li class="active">
                                    Dashboard
                                </li>--}}
                                <li class="search-box">
                                    <form class="sidebar-search">
                                        <div class="form-group">
                                            <input type="text" placeholder="Start Searching...">
                                            <button class="submit">
                                                <i class="clip-search-3"></i>
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ol>

                            <!-- end: PAGE TITLE & BREADCRUMB -->


        </div>
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container">
            <div class="navbar-content">
                <!-- start: SIDEBAR -->
                @include('partials.sidebar')
                <!-- end: SIDEBAR -->
            </div>
            <!-- start: PAGE -->
            <div class="main-content">
                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                            @yield('breadcrumbs')
                            </ol>
                            <div class="page-header">
                                @yield('header', '<h1>Title <small>subtitle</small></h1>')
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                    </div>
                    <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->
                    @yield('content')
                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        <div class="footer clearfix">
            <div class="footer-inner">
                {!! date("Y") !!} &copy; {!! HTML::link('http://pacoorozco.info', 'Paco Orozco', array('rel' => 'nofollow')) !!} - Powered by {!! HTML::link('https://github.com/pacoorozco/ssham', 'SSHAM v2', array('rel' => 'nofollow')) !!}
            </div>
            <div class="footer-items">
                <span class="go-top"><i class="clip-chevron-up"></i></span>
            </div>
        </div>
        <!-- end: FOOTER -->
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        {!! HTML::script(asset('plugins/respond.min.js')) !!}
        {!! HTML::script(asset('plugins/excanvas.min.js')) !!}
        {!! HTML::script(asset('plugins/jQuery-lib/1.10.2/jquery.min.js')) !!}
        <![endif]-->
        <!--[if gte IE 9]><!-->
        {!! HTML::script(asset('plugins/jQuery-lib/2.0.3/jquery.min.js')) !!}
        <!--<![endif]-->
        {!! HTML::script(asset('plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')) !!}
        {!! HTML::script(asset('plugins/bootstrap/js/bootstrap.min.js')) !!}
        {!! HTML::script(asset('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')) !!}
        {!! HTML::script(asset('plugins/blockUI/jquery.blockUI.js')) !!}
        {!! HTML::script(asset('plugins/iCheck/jquery.icheck.min.js')) !!}
        {!! HTML::script(asset('plugins/perfect-scrollbar/src/jquery.mousewheel.js')) !!}
        {!! HTML::script(asset('plugins/perfect-scrollbar/src/perfect-scrollbar.js')) !!}
        {!! HTML::script(asset('plugins/less/less-1.5.0.min.js')) !!}
        {!! HTML::script(asset('plugins/jquery-cookie/jquery.cookie.js')) !!}
        {!! HTML::script(asset('plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js')) !!}
        {!! HTML::script(asset('plugins/jquery-cookie/jquery.cookie.js')) !!}
        {!! HTML::script(asset('js/main.js')) !!}
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        @yield('scripts')
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
            jQuery(document).ready(function () {
                Main.init();
            });
        </script>
    </body>
    <!-- end: BODY -->
</html>