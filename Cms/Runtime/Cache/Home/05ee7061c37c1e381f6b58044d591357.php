<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN" class="translated-ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/Cms/Public/images/help-icon.svg">

    <!-- App css -->
    <!-- build:css -->
    <link href="/Cms/Public/css/app.min.css" rel="stylesheet">

    <!-- endbuild -->
    <link type="text/css" rel="stylesheet" href="chrome-extension://pioclpoplcdbaefihamjohnefbikjilc/content.css">
    <link type="text/css" rel="stylesheet" charset="UTF-8" href="/Cms/Public/css/translateelement.css">
</head>

<body class="authentication-bg">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card">

                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="http://coderthemes.com/hyper/index.html">
                            <span><img src="/Cms/Public/images/logo.png" alt="" height="18"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 font-weight-bold">管理</h4>
                            <p class="text-muted mb-4">输入您的电子邮件地址和密码以访问管理面板。</p>
                        </div>

                        <form action="<?php echo $href ?>" method="post">

                            <div class="form-group mb-3">
                                <label for="username">手机号</label>
                                <input name="username" class="form-control" type="tel" id="username" required
                                       placeholder="请输入商家手机号">
                                <small class="form-text text-muted">使用已经注册的商家手机号进行登陆</small>
                            </div>

                            <div class="form-group mb-3">
                                <a href="recoverpw.html" class="text-muted float-right">
                                    <small>忘记密码了吗？</small>
                                </a>
                                <label for="password">密码</label>
                                <input name="password" class="form-control" type="password" id="password" required
                                       placeholder="请输入密码">
                                <small class="form-text text-muted">密码为6-16位</small>
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                    <label class="custom-control-label" for="checkbox-signin">30天内记住我</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button id="form_submit" class="btn btn-primary" type="button"> 登录 </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">
                            还没有账号？
                            <a href="register.html" target="_blank" class="text-dark ml-1"> 现在注册 </a>
                        </p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">2018 © 微格印象工作室 -
    <a href="http://www.weigrille.com/" target="_blank">www.weigrille.com</a>
</footer>

<!-- bundle -->
<script src="/Cms/Public/js/app.min.js"></script>

<!-- third party js -->
<script src="/Cms/Public/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/Cms/Public/js/jquery-jvectormap-world-mill-en.js"></script>
<!-- third party js ends -->

<!-- Include Data Script -->
<script src="/Cms/Public/js/public.js"></script>
<script src="/Cms/Public/js/login.js"></script>
</body>
</html>