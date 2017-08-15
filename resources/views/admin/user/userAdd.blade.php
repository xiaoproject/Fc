@extends('admin.layouts.public')

@section('title')
    管理员添加
@endsection

@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span> 管理员管理
        <span class="c-gray en">&gt;</span> 管理员添加
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
           href="javascript:location.replace(location.href);" title="刷新">
            <i class="Hui-iconfont">&#xe68f;</i>
        </a>
    </nav>
    <article class="page-container">
        <form class="form form-horizontal" id="form-admin-add">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="username" name="username">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password"
                           name="password">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="password" class="input-text" autocomplete="off" placeholder="确认新密码"
                           id="password_confirmation"
                           name="password_confirmation">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="" placeholder="" id="phone" name="phone">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" placeholder="@" name="email" id="email">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">角色：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="role_id" size="1">
				<option value="0">超级管理员</option>
				<option value="1">总编</option>
				<option value="2">栏目主辑</option>
				<option value="3">栏目编辑</option>
			</select>
			</span></div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">备注：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <textarea name="mark_up" cols="" rows="" class="textarea" placeholder="说点什么...100个字符以内"
                              dragonfly="true"
                              onKeyUp="$.Huitextarealength(this,100)"></textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>

@endsection

@section('business')
    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript"
            src="{{asset('resources/org/hui/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('resources/org/hui/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('resources/org/hui/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('.skin-minimal input').iCheck({
                checkboxClass: 'icheckbox-blue',
                radioClass: 'iradio-blue',
                increaseArea: '20%'
            });

            $("#form-admin-add").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    },
                    phone: {
                        required: true,
                        isPhone: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    role_id: {
                        required: true,
                    },
                },
                onkeyup: false,
                focusCleanup: true,
                success: "valid",
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: 'post',
                        url: "{{url('admin/user')}}",
                        success: function (data) {
                            if (!(data instanceof Object)) {
                                data = JSON.parse(data);
                            }
                            var code = data.code;
                            if (code === -1) {
                                // 失败
                                layer.msg('添加失败', {icon: 5, time: 1000});
                            } else if (code === 0) {
                                // 成功跳转
                                location.href = "{{url('admin/user')}}" + '?showLayer=1';
                            }
                        },
                        error: function (XmlHttpRequest, textStatus, errorThrown) {
                            layer.msg('error!', {icon: 1, time: 1000});
                        }
                    });
                }
            });
        });
    </script>
    <!--/请在上方写此页面业务相关的脚本-->

@endsection
