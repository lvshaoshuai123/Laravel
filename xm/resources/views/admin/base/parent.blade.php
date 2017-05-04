<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>Super Admin Responsive Template</title>
            
        <!-- CSS -->
        <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('admin/css/animate.min.css')}}" rel="stylesheet">
        <link href="{{ asset('admin/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset('admin/css/form.css')}}" rel="stylesheet">
        <link href="{{ asset('admin/css/calendar.css')}}" rel="stylesheet">
        <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('admin/css/icons.css')}}" rel="stylesheet">
        <link href="{{ asset('admin/css/generics.css')}}" rel="stylesheet"> 
    </head>
    <body id="skin-blur-violate">

        <header id="header" class="media">
            <a href="" id="menu-toggle"></a> 
            <a class="logo pull-left" href="index.html">SUPER ADMIN 1.0</a>
            
            <div class="media-body">
                <div class="media" id="top-menu">
                    <div class="pull-left tm-icon">
                        <a data-drawer="messages" class="drawer-toggle" href="">
                            <i class="sa-top-message"></i>
                            <i class="n-count animated">5</i>
                            <span>Messages</span>
                        </a>
                    </div>
                    <div class="pull-left tm-icon">
                        <a data-drawer="notifications" class="drawer-toggle" href="">
                            <i class="sa-top-updates"></i>
                            <i class="n-count animated">9</i>
                            <span>Updates</span>
                        </a>
                    </div>

                    

                    <div id="time" class="pull-right">
                        <span id="hours"></span>
                        :
                        <span id="min"></span>
                        :
                        <span id="sec"></span>
                    </div>
                    
                    <div class="media-body">
                        <input type="text" class="main-search">
                    </div>
                </div>
            </div>
        </header>
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
            <!-- Sidebar -->
            <aside id="sidebar">
                
                <!-- Sidbar Widgets -->
                <div class="side-widgets overflow">
                    <!-- Profile Menu -->
                    <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                        <a href="" data-toggle="dropdown">
                            <img class="profile-pic animated" src="{{asset('admin/img/profile-pic.jpg')}}" alt="">
                        </a>
                        <ul class="dropdown-menu profile-menu">
                            <li><a href="">My Profile</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Messages</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="">Settings</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="/admin1/out">Sign Out</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                        </ul>
                        <h4 class="m-0">Malinda Hollaway</h4>
                        @malinda-h
                    </div>
                    
                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
                    
                    <!-- Feeds -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                           News Feeds
                        </h2>
                        
                        <div class="s-widget-body">
                            <div id="news-feed"></div>
                        </div>
                    </div>
                    
                    <!-- Projects -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                            Projects on going
                        </h2>
                        
                        <div class="s-widget-body">
                            <div class="side-border">
                                <small>Joomla Website</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="progress-bar tooltips progress-bar-danger" style="width: 60%;" data-original-title="60%">
                                          <span class="sr-only">60% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Opencart E-Commerce Website</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-info" style="width: 43%;" data-original-title="43%">
                                          <span class="sr-only">43% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Social Media API</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-warning" style="width: 81%;" data-original-title="81%">
                                          <span class="sr-only">81% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>VB.Net Software Package</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-success" style="width: 10%;" data-original-title="10%">
                                          <span class="sr-only">10% Complete</span>
                                     </a>
                                </div>
                            </div>
                            <div class="side-border">
                                <small>Chrome Extension</small>
                                <div class="progress progress-small">
                                     <a href="#" data-toggle="tooltip" title="" class="tooltips progress-bar progress-bar-success" style="width: 95%;" data-original-title="95%">
                                          <span class="sr-only">95% Complete</span>
                                     </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Side Menu -->
                <ul class="list-unstyled side-menu">
                    <li class="active">
                        <a class="sa-side-home" href="index.html">
                            <span class="menu-item">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                      <a class="sa-side-ui" href="">
                          <span class="menu-item">网站配置管理</span>
                      </a>
                      <ul class="list-unstyled menu-item">
                          <li><a href="/admin1/net">网站配置信息浏览</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="sa-side-calendar" href="">
                          <span class="menu-item">友情链接管理</span>
                      </a>
                      <ul class="list-unstyled menu-item">
                          <li><a href="/admin1/link">友情链接信息浏览</a></li>
                          <li><a href="/admin1/link/create">添加友情链接</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a class="sa-side-page" href="">
                          <span class="menu-item">商品分类管理</span>
                      </a>
                      <ul class="list-unstyled menu-item">
                          <li><a href="/admin1/goodcate">商品分类信息浏览</a></li>
                          <li><a href="/admin1/goodcate/create">添加商品分类</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-widget" href="">
                          <span class="menu-item">地址管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                          <li><a href="/admin1/address">地址信息浏览</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-folder" href="">
                          <span class="menu-item">轮播图片管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                          <li><a href="/admin1/carousel">轮播图片浏览</a></li>
                          <li><a href="/admin1/carousel/create">添加轮播图片</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">用户管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin1/user">显示用户列表</a></li>
                            <li><a href="/admin1/user/create">添加用户</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">评价管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin1/eval">评价列表</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">管理员管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin1/auser">显示管理员信息</a></li>
                            <li><a href="/admin1/auser/create">添加管理员</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">商品管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin1/goods">显示商品信息</a></li>
                            <li><a href="/admin1/goods/create">添加商品</a></li>
                        </ul>
                    </li>
                     <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">订单管理</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin1/orderlist">所有订单</a></li>
                            <li><a href="/admin1/order">退款订单</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </aside>
        
            <!-- Content -->
            <section id="content" class="container">
            @yield('content');
            </section>

            <!-- Older IE Message -->
            <!--[if lt IE 9]>
                <div class="ie-block">
                    <h1 class="Ops">Ooops!</h1>
                    <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order to access the maximum functionality of this website. </p>
                    <ul class="browsers">
                        <li>
                            <a href="https://www.google.com/intl/en/chrome/browser/">
                                <img src="(asset('admin/img/browsers/chrome.png')}}" alt="">
                                <div>Google Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.mozilla.org/en-US/firefox/new/">
                                <img src="(asset('admin/img/browsers/firefox.png')}}" alt="">
                                <div>Mozilla Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com/computer/windows">
                                <img src="(asset('admin/img/browsers/opera.png')}}" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://safari.en.softonic.com/">
                                <img src="(asset('admin/img/browsers/safari.png')}}" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                                <img src="(asset('admin/img/browsers/ie.png')}}" alt="">
                                <div>Internet Explorer(New)</div>
                            </a>
                        </li>
                    </ul>
                    <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
                </div>   
            <![endif]-->
        </section>
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="{{asset('admin/js/jquery.min.js')}}"></script> <!-- jQuery Library -->
        <script src="{{asset('admin/js/jquery-ui.min.js')}}"></script> <!-- jQuery UI -->
        <script src="{{asset('admin/js/jquery.easing.1.3.js')}}"></script> <!-- jQuery Easing - Requirred for Lightbox + Pie Charts-->

        <!-- Bootstrap -->
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

        <!-- Charts -->
        <script src="{{asset('admin/js/charts/jquery.flot.js')}}"></script> <!-- Flot Main -->
        <script src="{{asset('admin/js/charts/jquery.flot.time.js')}}"></script> <!-- Flot sub -->
        <script src="{{asset('admin/js/charts/jquery.flot.animator.min.js')}}"></script> <!-- Flot sub -->
        <script src="{{asset('admin/js/charts/jquery.flot.resize.min.js')}}"></script> <!-- Flot sub - for repaint when resizing the screen -->

        <script src="{{asset('admin/js/sparkline.min.js')}}"></script> <!-- Sparkline - Tiny charts -->
        <script src="{{asset('admin/js/easypiechart.js')}}"></script> <!-- EasyPieChart - Animated Pie Charts -->
        <script src="{{asset('admin/js/charts.js')}}"></script> <!-- All the above chart related functions -->

        <!-- Map -->
        <script src="{{asset('admin/js/maps/jvectormap.min.js')}}"></script> <!-- jVectorMap main library -->
        <script src="{{asset('admin/js/maps/usa.js')}}"></script> <!-- USA Map for jVectorMap -->

        <!--  Form Related -->
        <script src="{{asset('admin/js/icheck.js')}}"></script> <!-- Custom Checkbox + Radio -->

        <!-- UX -->
        <script src="{{asset('admin/js/scroll.min.js')}}"></script> <!-- Custom Scrollbar -->

        <!-- Other -->
        <script src="{{asset('admin/js/calendar.min.js')}}"></script> <!-- Calendar -->
        <script src="{{asset('admin/js/feeds.min.js')}}"></script> <!-- News Feeds -->
        

        <!-- All JS functions -->
        <script src="{{asset('admin/js/functions.js')}}"></script>
    </body>
</html>
