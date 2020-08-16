<?php 
     $this->start('facebook');
 ?>
<script>
(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1109847795819205";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>   
<?php  $this->end() ?>
<div class="container white-bg">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
            <li class="breadcrumb-item active"><?php echo $this->Html->link(__('CONTACT'),array('controller'=>'contacts','action'=>'index')) ?></li>
        </ul>
    <div class="row">
        <div class="col-sm-12"></div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-sm-6">
            <?php echo $fcontent2['Content'][__('dbcontent')] ?>
        </div>
        <div class="col-sm-6">

            <?php echo $contactmaps['Content'][__('dbcontent')]; ?>
        </div>
    </div>
</div>
 
