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
        <link href="{{ asset('Admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('Admin/css/generics.css') }}" rel="stylesheet"> 
    </head>
    <body id="skin-blur-violate">
        <section id="login">
            <header>
                <h1>SUPER ADMIN</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
            </header>
        
            <div class="clearfix">
                
            </div>
            
            <!-- Login -->
            @if(session('msg'))
                <script>
                        alert('{{session('msg')}}');
                </script>
            @endif
                

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                    </ul>
               </div>
            @endif
            <form class="box tile animated active" id="box-login" action='/admin/dologin' method='post' >
            {{ csrf_field()}}
                <h2 class="m-t-0 m-b-15">登录</h2>
                <input type="text" class="login-control m-b-10" placeholder="用户名或邮箱" name='Auser_name'>

                <input type="password" class="login-control" placeholder="密码" name='Auser_pwd'>

                 请输入验证码：
                <div class='row'>
                    <div class='col-xs-4'>
                        <input type='text' class='login-control m-b-10' name='mycode'>
                    </div>
                    <div class='col-xs-4'>
                        <img src="{{ url('/Admin/captch/'.time()) }}" onclick="this.src='{{ url('/Admin/captch') }}/'+Math.random()" />
                    </div>
                </div>
             
                <button class="btn btn-sm m-r-5">登录</button>
                
                <small>
                    <a class="box-switcher" data-switch="box-register" href="">注册</a> or
                    <a class="box-switcher" data-switch="box-reset" href="">忘记密码？</a>
                </small>
            </form>
            
            <!-- Register -->
            <form class="box animated tile" id="box-register" method='post' action='/auser'>
                {{ csrf_field() }}
                <h2 class="m-t-0 m-b-15">注册</h2>
                <input type="text" class="login-control m-b-10" placeholder="姓名" name='Auser_name'>
                <input type="password" class="login-control m-b-10" placeholder="密码" name='Auser_pwd'>
                <!-- <input type="password" class="login-control m-b-20" placeholder="再次确认密码" name='User_ppwd'> -->
               
                <button class="btn btn-sm m-r-5">注册</button>

                <small><a class="box-switcher" data-switch="box-login" href="">已经有管理员账号</a></small>
            </form>
            
            <!-- Forgot Password -->
            <form class="box animated tile" id="box-reset">
                <h2 class="m-t-0 m-b-15">Reset Password</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
                <input type="email" class="login-control m-b-20" placeholder="Email Address">    

                <button class="btn btn-sm m-r-5">Reset Password</button>

                <small><a class="box-switcher" data-switch="box-login" href="">Already have an Account?</a></small>
            </form>
        </section>                      
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="{{asset('Admin/js/jquery.min.js') }}"></script> <!-- jQuery Library -->
        
        <!-- Bootstrap -->
        <script src="{{asset('Admin/js/bootstrap.min.js') }}"></script>
        
        <!--  Form Related -->
        <script src="{{asset('Admin/js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->
        
        <!-- All JS functions -->
        <script src="{{asset('Admin/js/functions.js') }}"></script>
    </body>
</html>

