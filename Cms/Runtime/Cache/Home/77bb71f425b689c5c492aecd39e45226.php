<?php if (!defined('THINK_PATH')) exit();?><!-- 引入公共头文件  -->
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">

    <title>仪表盘</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/Cms/Public/images/help-icon.svg">

    <!-- third party css -->
    <!--<link href="/Cms/Public/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">-->
    <!-- third party css end -->

    <!-- App css -->
    <!-- build:css -->
    <link href="/Cms/Public/css/app.min.css" rel="stylesheet">
    <link href="/Cms/Public/css/custom.css" rel="stylesheet">
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
                    <img src="/Cms/Public/images/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="/Cms/Public/images/logo_sm.png" alt="" height="16">
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
                        <i class="mdi mdi-home-account"></i>
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

                <!-- 产品 -->
                <li class="side-nav-item">
                    <a href="<?php echo ($product); ?>" class="side-nav-link">
                        <i class="mdi mdi-reproduction"></i>
                        <span> 产品 </span>
                    </a>
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
                <img src="/Cms/Public/images/help-icon.svg" height="90" alt="Helper Icon Image"/>
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
                            <img src="/Cms/Public/images/avatar-1.jpg" alt="user-image" class="rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Hi <?php echo ($username); ?>!</h6>
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
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo ($store); ?>">我的店</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo ($store_edit); ?>">编辑</a></li>
                        <li class="breadcrumb-item active">店铺照片</li>
                    </ol>
                </div>
                <h4 class="page-title">店铺照片</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <!-- form Start.-->
        <form class="hidden" hidden id="j_storePicForm" target="storePicForm" action="<?php echo ($uploadAction); ?>" enctype="multipart/form-data" method="post">
            <input name="file" type="file" accept="image/jpeg, image/jpg, image/png">
            <input name="id" value="<?php echo ($id); ?>" type="hidden">
            <input name="class" value="<?php echo ($class); ?>" type="hidden">
        </form>
        <!-- form End. -->

        <div class="col-xl-4">
            <div id="j_picShow" class="card bg-primary">
                <div class="card-body pic-card">
                    <div class="text-center">
                        <h3 class="font-weight-normal text-white mt-2 mb-3"><i class="mdi mdi-plus mdi-48px"></i></h3>
                        <a id="j_storePicSelect" href="javascript:void(0)" class="btn btn-outline-light btn-sm mb-1 mt-2" data-subject="j_storePicForm">选择
                            <i class="mdi mdi-file-image ml-1"></i>
                        </a>
                        <a id="j_storePicSave" href="javascript:void(0)" class="btn btn-outline-light btn-sm mb-1 mt-2" data-subject="j_storePicForm" hidden>保存
                            <i class="mdi mdi-file-image ml-1"></i>
                        </a>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
        </div> <!-- 图片 End. -->

        <?php for($i=0; $i< count($pic); $i++){ ?>
        <div class="col-xl-4">
            <div class="card pic-box">
                <img class="card-img-top pic-img" src="<?php echo ($pic[$i]); ?>" alt="">
            </div> <!-- end card-->
        </div> <!-- 图片 End. -->
        <?php } ?>


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
<script src="/Cms/Public/js/app.min.js"></script>
<script src="/Cms/Public/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/Cms/Public/js/public.js"></script>
<script src="/Cms/Public/js/layer.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/Cms/Public/js/main.js" type="module"></script>
<script src="/Cms/Public/js/product.js"></script>
</body>
</html>