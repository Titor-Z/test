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
                                    <li class="breadcrumb-item"><a href="<?php echo ($store); ?>">产品</a></li>
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
                    <div class="col-lg-10" id="set">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="mb-3 header-title"> 基本设置 </h4>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">产品名称</label>
                                    <div class="col-9">
                                        <input id="j_s_name" type="text" class="form-control" placeholder="请输入产品名称"
                                               value="<?php echo ($info['name']); ?>">
                                        <span class="text-muted font-13">e.g "大床房"</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">价格</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input id="j_s_price" type="text" class="form-control" placeholder="请输入价格"
                                                   value="<?php echo ($info['price']); ?>">
                                        </div>
                                        <span class="text-muted font-13">e.g "¥200/晚"</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">上网</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input id="j_s_online" type="text" class="form-control" placeholder="请输入上网方式"
                                                   value="<?php echo ($info['online']); ?>">
                                        </div>
                                        <span class="text-muted font-13">e.g "WIFI"</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">卫浴</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input id="j_s_bath" type="text" class="form-control" placeholder="请输入卫浴方式"
                                                   value="<?php echo ($info['bath']); ?>">
                                        </div>
                                        <span class="text-muted font-13">e.g "独立/无"</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">窗户</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input id="j_s_window" type="text" class="form-control" placeholder="请输入是否有窗户"
                                                   value="<?php echo ($info['window']); ?>">
                                        </div>
                                        <span class="text-muted font-13">e.g "有/无"</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">可住人数</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input id="j_s_capacity" type="text" class="form-control" placeholder="请输入可住的人数"
                                                   value="<?php echo ($info['capacity']); ?>">
                                        </div>
                                        <span class="text-muted font-13">e.g "2人"</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">房间面积</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input id="j_s_area" type="text" class="form-control" placeholder="请输入房间面积"
                                                   value="<?php echo ($info['area']); ?>">
                                        </div>
                                        <span class="text-muted font-13">e.g "20m<sup>2</sup>"</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">楼层</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input id="j_s_floor" type="text" class="form-control" placeholder="请输入房间所在的楼层"
                                                   value="<?php echo ($info['floor']); ?>">
                                        </div>
                                        <span class="text-muted font-13">e.g "3层"</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">床型</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input id="j_s_model" type="text" class="form-control" placeholder="请输入床型"
                                                   value="<?php echo ($info['model']); ?>">
                                        </div>
                                        <span class="text-muted font-13">e.g "单人床 1.2x2.0m 2张"</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">早餐</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input id="j_s_breakfast" type="text" class="form-control" placeholder="请输入早餐"
                                                   value="<?php echo ($info['breakfast']); ?>">
                                        </div>
                                        <span class="text-muted font-13">e.g "无/牛奶"</span>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-3 col-form-label text-right">注意事项</label>
                                    <div class="col-9">
                                            <textarea id="j_s_other" type="email" class="form-control"
                                                      placeholder="请输入注意事项" rows="5"><?php echo ($info['other']); ?></textarea>
                                        <span class="text-muted font-13">e.g "1、请在14:00之后入住并于次日12:00之前退房；如需提前入住或延迟退房，请咨询商家2、入住需交押金，金额以前台为准3、如需发票，请向前台索取"</span>
                                    </div>
                                </div>

                                <input id="j_s_id" type="hidden" value="<?php echo ($info['id']); ?>">

                                <div class="form-group mb-0 justify-content-end row">
                                    <div class="col-9">
                                        <button onclick="saveProduct(this)" id="storeBashSave" data-href="<?php echo ($saveUrl); ?>" type="button"
                                                class="btn btn-info">确定
                                        </button>
                                    </div>
                                </div>
                            </div>  <!-- end card-body -->
                        </div> <!-- 基本设置 End. -->
                    </div> <!-- 右侧内容 End. -->

                </div>

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
<script src="/Cms/Public/js/product-upload.js" type="module"></script>
</body>
</html>