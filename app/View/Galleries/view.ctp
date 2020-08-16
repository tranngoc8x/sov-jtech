<?php

$this->start('script')?>
<script src="<?php echo $this->webroot ?>libs/fancy/js/jquery.fancybox.js"></script>
<link href="<?php echo $this->webroot ?>libs/fancy/css/jquery.fancybox.css" type="text/css" rel="stylesheet"/>
<?php $this->end() ?>
<div class="container white-bg" >
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'galleries','action'=>'home')) ?></li>
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('PHOTO'),array('controller'=>'galleries','action'=>'index')) ?></li>
        <li class="breadcrumb-item active"><?php echo $this->Html->link($galleries['Gallery'][__('dbname')],array('controller'=>'galleries','action'=>'index',$this->Link->seo($galleries['Gallery']['id'],$galleries['Gallery'][__('dbname')]))) ?></li>
    </ul>
    <div class="row catnewslists">

        <div class="col-sm-12">
            <div class="text-center"><h2><?php echo $galleries['Gallery'][__('dbname')] ?></h2></div>
            <div class="newsdesc"><?php echo $galleries['Gallery'][__('description')] ?></div>
            <br />
            <div class="text-center">
                <div class="fb-like" data-href="<?php echo $this->Html->url(array('controller'=>'galleries','action'=>'view',$this->Link->seo($galleries['Gallery']['id'],$galleries['Gallery'][__('dbname')])),true) ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                 <div class="fb-comments" data-width="auto" data-href="<?php echo $this->Html->url(array('controller'=>'galleries','action'=>'view',$this->Link->seo($galleries['Gallery']['id'],$galleries['Gallery'][__('dbname')])),true) ?>" data-numposts="5"></div> 
                </div>
        </div>
    </div>
    <div class="row">

        <?php foreach ($images as $kk1 => $vk1): ?>
            <div class="col-xs-12 col-sm-3">
                <div class="thumbnail">
                    <?php if (is_file('files/uploads/galleries/'.@$vk1['Gallery']['catpath'].'/'.$vk1['Image']['url'])): ?>
                        <a class="fancybox" data-fancybox="gallery" href="<?php echo $this->webroot;?>files/uploads/galleries/<?php echo $vk1['Gallery']['catpath']?>/<?php echo $vk1['Image']['url']?>" data-fancybox-group="gallery" title="<?php echo $vk1['Image']['name'] ?>">
                        <?php echo $this->Html->image('/files/uploads/galleries/'.$vk1['Gallery']['catpath'].'/'.$vk1['Image']['thumb'],array('alt'=>$vk1['Gallery']['name'],'class'=>'img-responsive','border'=>0,'style'=>'border:0; padding:1px;')) ?>
                        </a>
                    <?php endif ?>
<!--                    <div class="caption">
                    <?php //echo $vk1['Image']['name'] ?>
                    </div>-->
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="row">
                <div class="col-sm-12">

                    <div class="">
                        <h3 class="titleother"><?php echo $this->Html->link("Thư viện ảnh khác:",array('controller'=>'galleries','action'=>'index'),array('html'=>false,'escape'=>false)) ?></h3>
                        <ul class="otherlist">
                            <?php foreach ($other as $key => $v):?>
                                <li>
                                    <i class="glyphicon glyphicon-menu-right"></i>
                                    <?php echo $this->Html->link($v['Gallery'][__('dbname')],array('controller'=>'galleries',"action"=>'view',$this->Link->seo($v['Gallery']['id'],$v['Gallery'][__('dbname')])),array('escape'=>false,'html'=>false)) ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
</div>
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
 <?php    $this->end()?>