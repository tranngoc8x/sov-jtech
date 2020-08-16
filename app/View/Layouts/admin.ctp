<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<title>
		<?php echo $controllerName. " - " . $actionName; ?>
	</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Administrator</title>
    <link rel="shortcut icon" href="<?=$this->webroot?>img/favicon.ico" type="image/x-icon" >

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0">
    <!--/ END META SECTION -->

    <!-- START STYLESHEET SECTION -->
    <!-- IMPORTANT! : This is for demo purpose only. All the available plugin will be loaded at once -->
    <!-- Stylesheet(Bootstrap) -->
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/wickedpicker/wickedpicker.min.css">
    <!--/ Stylesheet(Bootstrap) -->

    <!-- Stylesheet(Application) -->

    <link rel="stylesheet" href="<?php echo $this->webroot;?>css/libs/style.css">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>css/libs/serene.css" id="base-color">
    <!--/ Stylesheet(Application) -->

    <!-- Stylesheet(Plugins) -->
    <!--<link rel="stylesheet" href="<?php echo $this->webroot;?>libs/jui/css/jquery-ui-1.10.3.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/snippet/css/jquery.snippet.min.css">-->
    <!--<link rel="stylesheet" href="<?php echo $this->webroot;?>libs/scrollbar/css/perfect-scrollbar.min.css">-->
    <!-- <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/icheck/css/jquery.icheck.min.css"> -->
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/select2/css/select2.min.css">
    <!--<link rel="stylesheet" href="<?php echo $this->webroot;?>libs/minicolor/css/jquery.minicolors.min.css">-->
    <!--<link rel="stylesheet" href="<?php echo $this->webroot;?>libs/tagit/css/jquery.tagit.min.css">-->
    <!-- <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/fullcalendar/css/fullcalendar.min.css"> -->
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/prettyphoto/css/prettyphoto.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/datatable/css/dataTables-bootstrap.min.css">
    <!--<link rel="stylesheet" href="<?php echo $this->webroot;?>libs/switch/css/bootstrapSwitch.min.css">-->
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/daterangepicker/css/daterangepicker.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/bootstrap-fileupload/css/bootstrap-fileupload.min.css">
    <link id="bsdp-css" href="<?php echo $this->webroot;?>libs/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link id="bsdp-css" href="<?php echo $this->webroot;?>libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="<?php echo $this->webroot;?>libs/gritter/css/jquery.gritter.min.css">-->
    <!--/ Stylesheet(Plugins) -->
        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
    <!-- Javascript(Modernizr) -->
    <script src="<?php echo $this->webroot;?>libs/modernizr/js/modernizr-2.6.2.min.js"></script>
        <!-- Javascript(Vendors) -->
    <script src="<?php echo $this->webroot;?>libs/jquery/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo $this->webroot;?>libs/jui/js/jquery-ui-1.10.3.min.js"></script>
    <script src="<?php echo $this->webroot;?>libs/jquery/js/jquery-migrate-1.2.1.min.js"></script>
    <!--/ Javascript(Vendors) -->
    <!--/ Javascript(Modernizr) -->
    <!--/ END JAVASCRIPT SECTION -->


    <link rel="stylesheet" href="<?php echo $this->webroot;?>css/libs/custom.css">
     <script src="<?php echo $this->webroot;?>libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo $this->webroot;?>libs/wickedpicker/wickedpicker.min.js"></script>
        <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->fetch('css');
    ?>
</head>
<body>
    <div id="wrapper" class="boxed-layout">
        <!-- START Template Canvas -->
        <div id="canvas">
            <!-- START Template Header -->
            <header id="header">
                <!-- START Logo -->
                <div class="logo hidden-phone hidden-tablet">
                    <a href="#"><img src="<?php echo $this->webroot;?>img/libs/logo-white.png" alt=""></a>
                </div>
                <!--/ END Logo -->

                <!-- START Mobile Sidebar Toggler -->
                <a href="#" class="toggler" data-toggle="sidebar"><span class="icon icone-reorder"></span></a>
                <!--/ END Mobile Sidebar Toggler -->

                <!-- START Toolbar -->
                <ul class="toolbar" id="toolbar">

                    <!-- START Profile -->
                    <li class="profile">
                        <a href="#" data-toggle="dropdown">
                            <span class="avatar"><img src="<?php echo $this->webroot;?>img/libs/avatar/avatar4.jpg" alt=""></span>
                            <span class="text hidden-phone"><?php echo $this->Session->read('Auth.User.name');?><span class="role"><?php echo $this->Session->read('Auth.User.Groups.name');?></span></span>
                            <span class="arrow icone-caret-down"></span>
                        </a>
                        <!-- START Dropdown Menu -->
                        <div class="dropdown-menu" role="menu">
                            <header>
                            </header>
                            <ul class="body">
                                <li>
                                   <?php echo $this->Html->link('<span class="icon icone-edit"></span>Profile',array('plugin'=>false,'admin'=>true,'controller'=>"users",'action'=>"edit"),array("class"=>"text",'escape'=>false));?>
                                </li>
                                <li>
                                   <?php echo $this->Html->link('<span class="icon icone-off"></span> Sign Off',array('plugin'=>false,'admin'=>true,'controller'=>"users",'action'=>"logout"),array("class"=>"text",'escape'=>false));?>
                                </li>

                            </ul>

                        </div>
                        <!--/ END Dropdown Menu -->
                    </li>
                    <!--/ END Profile -->
                </ul>
                <!--/ END Toolbar -->

            </header>
            <!--/ END Template Header -->

            <!-- START Template Sidebar -->
            <aside id="sidebar">
                <!-- START Sidebar Content -->
                <?php echo $this->element('libs/sidebar');?>
                <!--/ END Sidebar Content -->
            </aside>
            <!--/ END Template Sidebar -->

            <!-- START Template Main Content -->
            <section id="main">
                <!-- START Bootstrap Navbar -->
                <div class="navbar navbar-static-top">
                    <div class="navbar-inner">
                        <!-- Breadcrumb -->
                        <?php

                            $this->Html->addCrumb('Admin','/admin/');
                            $this->Html->addCrumb($controllerName,'/'.$this->request->url);
                            $this->Html->addCrumb($actionName,null);
                            echo $this->Html->getCrumbList(array('class'=>'breadcrumb','separator'=>'<span class="divider"></span>'));
                        ?>
                        <!--/ Breadcrumb -->
                    </div>
                </div>
                <!--/ END Bootstrap Navbar -->

                <!-- START Content -->
                <div class="container-fluid">
                    <!-- START Row -->
                    <div class="row-fluid">
                        <!-- START Page/Section header -->
                        <div class="span12">
                            <?php echo $this->Session->flash();?>
                            <?php echo $content_for_layout; ?>
                        </div>
                        <!--/ END Page/Section header -->
                    </div>
                    <!--/ END Row -->
                </div>
                <!--/ END Content -->

            </section>
            <!--/ END Template Main Content -->

            <!-- START Template Footer -->
            <footer id="footer">
                <p>Copyright © 2017 Trường THCS và THPT Tạ Quang Bửu</p>

                <!-- START To Top Scroller -->
                <a href="#" class="totop"><span class="icon icone-angle-up"></span></a>
                <!--/ END To Top Scroller -->
            </footer>

            <!--/ END Template Footer -->
        </div>

        <!--/ END Template Canvas -->
    </div>
    <?php //echo $this->element('sql_dump');?>
    <!--/ END Template Wrapper -->
     <!-- START JAVASCRIPT SECTION - Include at the bottom of the page to reduce load time -->


    <!-- Javascript(Plugins) -->
    <script src="<?php echo $this->webroot;?>libs/autosize/js/jquery.autosize.min.js"></script>
    <script src="<?php echo $this->webroot;?>libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->webroot;?>libs/daterangepicker/js/daterangepicker.min.js"></script>
    <script src="<?php echo $this->webroot;?>libs/bootstrap-fileupload/js/bootstrap-fileupload.min.js"></script>
    <script src="<?php echo $this->webroot;?>libs/moment/js/moment.min.js"></script>
    <script src="<?php echo $this->webroot;?>libs/prettyphoto/js/jquery.prettyphoto.min.js"></script>
    <script src="<?php echo $this->webroot;?>libs/select2/js/select2.min.js"></script>

    <script src="<?php echo $this->webroot;?>libs/wysiwyg/ckeditor/ckeditor.js"></script>
   

    <!-- Javascript (Application) -->
    <script>
</script>

    <?php echo $this->Html->script(array(
        'libs/plugins',
        'libs/application',
        'libs/sparkline.sample',
    ));?>
    <script type="text/javascript">
    $("a#chkAll").on("click",function(){
        var id = "";
        $('input[type=checkbox]:checked').each(function(){
            id+=$(this).val()+",";
        });
        id = id.slice(0,-1);
        //console.log(id);
        if(id != ""){
            if(confirm("Bạn có chắc muốn xóa các bản ghi này ?")){
                document.location.href='<?php echo $this->webroot."admin/".$this->name;?>/mdelete/'+id;
                return false;
            }
        }else{
            alert("Bạn cần chọn ít nhất 1 bản ghi!");
            return false;
        }
    });
</script>
<script>
$(function() {
    $('#datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "vi",
        autoclose: true
     });
         
    $('#timepicker').wickedpicker({title: ""});
    $('#datepickerend').datepicker({
        format: "dd/mm/yyyy",
        language: "vi",
        autoclose: true
     });

    $('#timepickerend').wickedpicker({title: ""});

});

</script>
<?php echo $this->fetch('script') ?>
    <!--/ Javascript (Application) -->
    <!--/ END JAVASCRIPT SECTION -->
</body>
</html>