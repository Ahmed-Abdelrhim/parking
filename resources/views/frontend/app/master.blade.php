<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <title>Q-Parking</title>
    @include('frontend.layouts.partials.head._head')
    @include('frontend.layouts.components.custom_style')



</head>
<!-- END: Head-->
    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click"
      data-menu="vertical-menu-modern" data-col="">
            @include('frontend.layouts.components.header')
            @include('frontend.layouts.components.main-menu')
                    @yield('main-content')
            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>
            @include('frontend.layouts.components.footer')
            @include('frontend.layouts.partials.script._script')


    </body>
</html>
