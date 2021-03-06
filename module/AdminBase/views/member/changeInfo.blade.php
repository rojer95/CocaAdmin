@extends('layout.layout')
@section('title', '编辑个人信息')
@section('cssImport')
    @cssimport(user)
@endsection
@section('content')
    <form class="layui-form">
        <div class="user_left">
            <div class="layui-form-item">
                <label class="layui-form-label">用户名</label>
                <div class="layui-input-block">
                    <input type="text" value="{{$_member->username}}" disabled class="layui-input layui-disabled">
                </div>
            </div>
            <!--
            <div class="layui-form-item">
                <label class="layui-form-label">用户组</label>
                <div class="layui-input-block">
                    <input type="text" value="超级管理员" disabled class="layui-input layui-disabled">
                </div>
            </div>
            -->
            <div class="layui-form-item">
                <label class="layui-form-label">真实姓名</label>
                <div class="layui-input-block">
                    <input type="text" name="nickname" value="{{$_member->nickname}}" placeholder="请输入真实姓名" lay-verify="required" class="layui-input realName">
                </div>
            </div>
            <div class="layui-form-item" pane="">
                <label class="layui-form-label">性别</label>
                <div class="layui-input-block userSex">
                    <input type="radio" name="sex" value="1" title="男" {{$_member->sex == 1 ? 'checked=""' : ''}}>
                    <input type="radio" name="sex" value="2" title="女" {{$_member->sex == 2 ? 'checked=""' : ''}}>
                    <input type="radio" name="sex" value="0" title="保密" {{$_member->sex == 0 ? 'checked=""' : ''}}>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">手机号码</label>
                <div class="layui-input-block">
                    <input type="tel" name="tel" value="{{$_member->tel}}" placeholder="请输入手机号码" lay-verify="required|phone" class="layui-input userPhone">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">出生年月</label>
                <div class="layui-input-block">
                    <input type="text" name="birthday" value="{{$_member->birthday}}" placeholder="请输入出生年月" lay-verify="required|date" onclick="layui.laydate({elem: this,max: laydate.now()})" class="layui-input userBirthday">
                </div>
            </div>
            <!--
            <div class="layui-form-item userAddress">
                <label class="layui-form-label">家庭住址</label>
                <div class="layui-input-inline">
                    <select name="province" lay-filter="province">
                        <option value="">请选择省</option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select name="city" lay-filter="city" disabled>
                        <option value="">请选择市</option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select name="area" lay-filter="area" disabled>
                        <option value="">请选择县/区</option>
                    </select>
                </div>
            </div>
            -->
            <!--
            <div class="layui-form-item">
                <label class="layui-form-label">兴趣爱好</label>
                <div class="layui-input-block userHobby">
                    <input type="checkbox" name="like[javascript]" title="Javascript">
                    <input type="checkbox" name="like[html]" title="HTML(5)">
                    <input type="checkbox" name="like[css]" title="CSS(3)">
                    <input type="checkbox" name="like[php]" title="PHP">
                    <input type="checkbox" name="like[.net]" title=".net">
                    <input type="checkbox" name="like[ASP]" title="ASP">
                    <input type="checkbox" name="like[C#]" title="C#">
                    <input type="checkbox" name="like[Angular]" title="Angular">
                    <input type="checkbox" name="like[VUE]" title="VUE">
                    <input type="checkbox" name="like[XML]" title="XML">
                </div>
            </div>
            -->
            <div class="layui-form-item">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-block">
                    <input type="text" name="mail" value="{{$_member->mail}}" placeholder="请输入邮箱" lay-verify="required|email" class="layui-input userEmail">
                </div>
            </div>
            <!--
            <div class="layui-form-item">
                <label class="layui-form-label">自我评价</label>
                <div class="layui-input-block">
                    <textarea placeholder="请输入内容" class="layui-textarea myself"></textarea>
                </div>
            </div>
            -->
        </div>
        <div class="user_right">
            {{--<p>由于是纯静态页面，所以只能显示一张随机的图片</p>--}}
            <img src="{{asset($_member->avatar)}}" class="layui-circle" id="userFace">
            <br/><br/>
            <input type="file" name="userFace" class="layui-upload-file" lay-title="掐指一算，我要换一个头像了">
            <input type="hidden" name="avatar" value="{{$_member->avatar}}">
        </div>
        <div class="layui-form-item" style="margin-left: 5%;">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="changeUser">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
@endsection

@section('jsImport')
    @jsimport(address)
    @jsimport(user)
@endsection