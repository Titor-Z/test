<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>编辑产品</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/Cms/Public/images/help-icon.svg">

    <!-- App css -->
    <!-- build:css -->
    <link href="/Cms/Public/css/app.min.css" rel="stylesheet">
    <link href="/Cms/Public/css/custom.css" rel="stylesheet">
    <!-- endbuild -->
    <style>
        .content-page{margin-left: 0 !important;}
    </style>
</head>

<body>

<!-- Begin page -->
<div class="wrapper">

    <div class="content-page">
        <div class="content">

            <!-- 中间内容 Start.-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo ($product); ?>">产品</a></li>
                                    <li class="breadcrumb-item active">编辑</li>
                                </ol>
                            </div>
                            <h4 class="page-title">产品</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <link rel="stylesheet" href="/Cms/Public/css/custom.css">


                <div class="row">
                    <!-- 左侧导航菜单 开始. -->
                    <div class="two-navbar col-lg-2">
                        <div class="slimscroll-menu">
                            <!--- Sidemenu -->
                            <ul class="metismenu side-nav">
                                <li class="side-nav-item">
                                    <a href=<?php echo $nav_product_bash.'?id='.I('id'); ?> class="side-nav-link text-dark">
                                        <span> 基本设置 </span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href=<?php echo $nav_product_pic.'?id='.I('id'); ?> class="side-nav-link text-dark">
                                        <span> 产品照片 </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div> <!-- Sidebar -left -->
                    </div> <!-- 左侧导航菜单 End. -->


                    <!-- 右侧内容 Start. -->
                    <div class="col-lg-10">
                        <div class="row">

                            <!-- form Start.-->
                            <form hidden id="j_ProductPicForm" target="productPicForm" action="<?php echo ($uploadUrl); ?>" method="post" enctype="multipart/form-data">
                                <input name="pFile" type="file" accept="image/x-jpg">
                                <input name="id" value=<?php echo I("get.id")?> type="hidden">
                                <input name="class" value="<?php echo ($class); ?>" type="hidden">
                                <input name="user" value="<?php echo ($user); ?>" type="hidden">
                            </form>
                            <!-- form End. -->

                            <div class="col-lg-4">
                                <div id="j_ProductPicShow" class="card bg-primary">
                                    <div class="card-body pic-card">
                                        <div class="text-center">
                                            <h3 class="font-weight-normal text-white mt-2 mb-3"><i class="mdi mdi-plus mdi-48px"></i></h3>
                                            <a id="j_product_select" href="javascript:void(0)" class="btn btn-outline-light btn-sm mb-1 mt-2">选择
                                                <i class="mdi mdi-file-image ml-1"></i>
                                            </a>
                                            <a id="j_product_save" href="javascript:void(0)" class="btn btn-outline-light btn-sm mb-1 mt-2" hidden>保存
                                                <i class="mdi mdi-file-image ml-1"></i>
                                            </a>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div>
                            </div> <!-- 图片 End. -->


                            <!-- 产品列表 Start. -->
                            <?php for($i=0; $i< count($pic); $i++){ ?>
                            <div class="col-xl-4">
                                <div class="card pic-box">
                                    <img class="card-img-top pic-img" src="<?php echo ($pic[$i]); ?>" alt="">
                                </div> <!-- end card-->
                            </div> <!-- 图片 End. -->
                            <?php } ?>
                            <!-- 产品列表 End. -->

                        </div> <!-- row End. -->
                    </div> <!-- 右侧内容 End -->




                </div> <!-- end row -->


            </div> <!-- container -->
        </div> <!-- content -->




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
<script src="/Cms/Public/js/product-upload.js" type="module"></script>
</body>
</html>