<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Đăng nhập</title>
        <link rel="shortcut icon" href="<?=$this->webroot?>img/favicon.ico" type="image/x-icon" >

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>css/libs/style.css">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/icheck/css/jquery.icheck.min.css">
    <link rel="stylesheet" href="<?php echo $this->webroot;?>libs/select2/css/select2.min.css">
    <script src="<?php echo $this->webroot;?>libs/jquery/js/jquery-1.11.0.min.js"></script>
        <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->fetch('css');
    ?>
</head>
<body>
<?php echo $this->fetch('content'); ?>
</body>
    <!--[if IE 8]><script src="/<?php echo $this->webroot;?>libs/respond/js/respond.min.js"></script><![endif]--> 
    <script src="<?php echo $this->webroot;?>libs/icheck/js/jquery.icheck.min.js"></script>
    <script src="<?php echo $this->webroot;?>libs/select2/js/select2.min.js"></script>
    <?php echo $this->Html->script(array('libs/plugins','libs/application'));?>
</body>
</html>