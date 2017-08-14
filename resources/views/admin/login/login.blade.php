﻿@extends('admin.layouts.public')
{{--标题--}}
@section('title')
    后台登录
@endsection

@section('orderCss')
    <link href="{{asset('resources/org/hui/static/h-ui.admin/css/H-ui.login.css')}}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('content')
    <input type="hidden" id="TenantId" name="TenantId" value=""/>
    <div class="loginWraper">
        <div id="loginform" class="loginBox">
            <form class="form form-horizontal" action="{{url('admin/index')}}" method="post">
                {{csrf_field()}}
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                    <div class="formControls col-xs-8">
                        <input id="" name="" type="text" placeholder="账户" class="input-text size-L">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                    <div class="formControls col-xs-8">
                        <input id="" name="" type="password" placeholder="密码" class="input-text size-L">
                    </div>
                </div>
                <div class="row cl">
                    <div class="formControls col-xs-8 col-xs-offset-3">
                        <input class="input-text size-L" type="text" placeholder="验证码"
                               onblur="if(this.value==''){this.value='验证码:'}"
                               onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
                        <img src="{{url('admin/getCode')}}" id="codeImg">
                        <a id="kanbuq" href="javascript:;">看不清，换一张</a></div>
                </div>
                <div class="row cl">
                    <div class="formControls col-xs-8 col-xs-offset-3">
                        <label for="online">
                            <input type="checkbox" name="online" id="online" value="">
                            使我保持登录状态</label>
                    </div>
                </div>
                <div class="row cl">
                    <div class="formControls col-xs-8 col-xs-offset-3">
                        <input name="" type="submit" class="btn btn-success radius size-L"
                               value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;"  >
                        <input name="" type="reset" class="btn btn-default radius size-L"
                               value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">Copyright xiao</div>


    <script type="text/javascript">
        $(function () {
            var codeImg = $('#codeImg'); // 验证码
            var loginBtn = $('#loginBtn'); // 登录按钮
            codeImg.on('click', function () {
                this.src = "{{url('admin/getCode')}}?" + Math.random();
            });

            $('#kanbuq').on('click', function () {
                codeImg.get(0).src = "{{url('admin/getCode')}}?" + Math.random();
            });
        });
    </script>
@endsection
