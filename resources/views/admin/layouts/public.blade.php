<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{asset('resources/org/hui/lib/html5shiv.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/hui/lib/respond.min.js')}}"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="{{url('resources/org/hui/static/h-ui/css/H-ui.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('resources/org/hui/static/h-ui.admin/css/H-ui.admin.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/org/hui/static/h-ui.admin/skin/default/skin.css')}}"
          id="skin"/>
    <link rel="stylesheet" type="text/css" href="{{url('resources/org/hui/lib/Hui-iconfont/1.0.8/iconfont.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('resources/org/hui/static/h-ui.admin/css/style.css')}}"/>

    {{--其他样式--}}
    @yield('orderCss')

    <!--[if IE 6]>
    <script type="text/javascript"
            src="{{asset('resources/org/hui/lib/DD_belatedPNG_0.0.8a-min.js')}}"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>@yield('title','后台')</title>
    <meta name="keywords" content="@yield('keyswords','这是关键字')">
    <meta name="description" content="@yield('description','这是描述')">

    <script type="text/javascript" src="{{asset('resources/org/hui/lib/jquery/1.9.1/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/hui/lib/layer/2.4/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/hui/static/h-ui/js/H-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/hui/static/h-ui.admin/js/H-ui.admin.js')}}"></script>
</head>
<body>


@yield('content')

</body>
</html>