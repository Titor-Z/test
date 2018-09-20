<?php if (!defined('THINK_PATH')) exit();?><!-- 引入公共头文件  -->
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">

    <title>仪表盘</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/cms/Public/images/help-icon.svg">

    <!-- third party css -->
    <link href="/cms/Public/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- third party css end -->

    <!-- App css -->
    <!-- build:css -->
    <link href="/cms/Public/css/app.min.css" rel="stylesheet">
    <!-- endbuild -->

</head>

<body>

<!-- Begin page -->
<div class="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div id="left_container" class="left-side-menu">

        <div class="slimscroll-menu">

            <!-- LOGO -->
            <a href="<?php echo ($home); ?>" class="logo text-center mb-4">
                <span class="logo-lg">
                    <img src="/cms/Public/images/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="/cms/Public/images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!--- Sidemenu -->
            <ul class="metismenu side-nav">

                <li class="side-nav-title side-nav-item">导航栏</li>

                <li class="side-nav-item">
                    <a href="<?php echo ($home); ?>" class="side-nav-link">
                        <i class="seven sev-meter"></i>
                        <span class="badge badge-success float-right">7</span>
                        <span> 仪表盘 </span>
                    </a>
                </li>

                <!-- 我的店 Start -->
                <li class="side-nav-item">
                    <a href="javascript: void(0);" class="side-nav-link">
                        <i class="seven sev-store"></i>
                        <span> 我的店 </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="side-nav-second-level" aria-expanded="false">
                        <li>
                            <a href="<?php echo ($store); ?>">查看</a>
                        </li>
                        <li>
                            <a href="<?php echo ($storeEdit); ?>">编辑</a>
                        </li>
                    </ul>
                </li>

                <!-- 设置 Start -->
                <li class="side-nav-item">
                    <a href="<?php echo ($myAccount); ?>" class="side-nav-link">
                        <i class="mdi mdi-settings"></i>
                        <span> 个人设置 </span>
                    </a>
                </li>

                <li class="side-nav-item">
                    <a href="docs/index.html" target="_blank" class="side-nav-link">
                        <i class="seven sev-article"></i>
                        <span> 使用说明 </span>
                    </a>
                </li>
            </ul>

            <!-- Help Box -->
            <div class="help-box text-center text-white">
                <a href="javascript: void(0);" class="float-right close-btn text-white">
                    <i class="mdi mdi-close"></i>
                </a>
                <img src="/cms/Public/images/help-icon.svg" height="90" alt="Helper Icon Image"/>
                <h5 class="mt-3">无限制访问</h5>
                <p class="mb-3">升级以计划访问无限制的报告</p>
                <a href="javascript: void(0);" class="btn btn-outline-light btn-sm">升级</a>
            </div>
            <!-- end Help Box -->
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topbar-right-menu float-right mb-0">
                    <!-- 个人信息 Start. -->
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#"
                           role="button" aria-haspopup="false"
                           aria-expanded="false">
                            <img src="/cms/Public/images/avatar-1.jpg" alt="user-image" class="rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">欢迎你 !</h6>
                            </div>

                            <!-- item-->
                            <a href="<?php echo ($myAccount); ?>" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle"></i>
                                <span> 我的账户 </span>
                            </a>

                            <!-- item-->
                            <a href="<?php echo ($logout); ?>" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout"></i>
                                <span>退出</span>
                            </a>

                        </div>
                    </li> <!-- 个人信息 End. -->

                </ul>

                <!-- 搜索框 Start. -->
                <div class="app-search">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="找你想要的。。。">
                            <span class="mdi mdi-magnify"></span>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">点我</button>
                            </div>
                        </div>
                    </form>
                </div>

                <button class="button-menu-mobile open-left disable-btn">
                    <i class="mdi mdi-menu"></i>
                </button> <!-- 搜索框 End. -->
            </div>
            <!-- end Topbar -->


            <!-- 中间内容 Start.-->
            <div id="container" class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">快捷方式</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-xl-2">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="text-center">
                                    <h3 class="font-weight-normal text-white mb-2">店铺介绍</h3>
                                    <a href="#" class="btn btn-outline-light btn-sm mb-1 mt-2">查看
                                        <i class="mdi mdi-arrow-right ml-1"></i>
                                    </a>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                    </div> <!-- 选项 End. -->

                    <!-- 选项 Start. -->
                    <div class="col-xl-2">
                        <div class="card bg-danger">
                            <div class="card-body">
                                <div class="text-center">
                                    <h3 class="font-weight-normal text-white mb-2">最新活动</h3>

                                    <a href="#" class="btn btn-outline-light btn-sm mb-1 mt-2">查看
                                        <i class="mdi mdi-arrow-right ml-1"></i>
                                    </a>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                    </div> <!-- 选项 End. -->

                    <div class="col-xl-2">
                        <div class="card bg-success">
                            <div class="card-body">
                                <div class="text-center">
                                    <h3 class="font-weight-normal text-white mb-2">版块管理</h3>

                                    <a href="#" class="btn btn-outline-light btn-sm mb-1 mt-2">查看
                                        <i class="mdi mdi-arrow-right ml-1"></i>
                                    </a>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                    </div> <!-- 选项 End. -->

                    <div class="col-xl-2">
                        <div class="card bg-warning">
                            <div class="card-body">
                                <div class="text-center">
                                    <h3 class="font-weight-normal text-white mb-2">房间管理</h3>
                                    <a href="#" class="btn btn-outline-light btn-sm mb-1 mt-2">查看
                                        <i class="mdi mdi-arrow-right ml-1"></i>
                                    </a>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div>
                    </div> <!-- 选项 End. -->

                </div> <!-- end row -->
            </div>
            <!-- container -->

        </div>
        <!-- content -->

<!-- 引入公共头文件  -->
<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                2018 © 微格印象工作室 - weigrille.com
            </div>
            <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-sm-block">
                    <a href="javascript: void(0);">关于我们</a>
                    <a href="javascript: void(0);">获取支持</a>
                    <a href="javascript: void(0);">联系我们</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- bundle -->
<script src="/cms/Public/js/app.min.js"></script>

<!-- third party js -->
<script src="/cms/Public/js/Chart.bundle.js"></script>
<script src="/cms/Public/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/cms/Public/js/jquery-jvectormap-world-mill-en.js"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="/cms/Public/js/demo.dashboard.js"></script>
<!-- end demo js-->

<!-- Include Data Script -->
<script src="/cms/Public/js/template.js"></script>
<!--<script src="/cms/Public/script/login-statue.js"></script>-->
<!--<script src="/cms/Public/script/config.js"></script>-->
<!--<script src="/cms/Public/script/left-sidebar.js"></script>-->
<!--<script src="/cms/Public/script/index.js"></script>-->

</body>
</html>