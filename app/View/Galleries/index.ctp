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
<?php   $this->end() ?>
<style>
    
    .glist .col-sm-3:nth-child(4n+1){
        clear: left
    }
</style>
<div class="container white-bg">
    <ul class="breadcrumb">
        <li  class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
        <li class="breadcrumb-item active"><?php echo $this->Html->link(__('PHOTO'),array('controller'=>'galleries','action'=>'index')) ?></li>
    </ul>

    <div class="row glist">
	    <?php foreach ($galleries as $kk1 => $vk1): ?>
			<div class="col-sm-3 text-center">
  				<a class="newWindow cboxElement" href="<?php echo $this->Html->url(array("action"=>"view",$this->Link->seo($vk1['Gallery']['id'],$vk1['Gallery']['name'])));?>">
					<?php if (is_file('files/uploads/galleries/'.@$vk1['Gallery']['catpath'].'/'.$vk1['Image'][0]['thumb'])): ?>
					<?php echo $this->Html->image('/files/uploads/galleries/'.$vk1['Gallery']['catpath'].'/'.$vk1['Image'][0]['thumb'],array('alt'=>$vk1['Gallery'][__('name')],'style'=>'border: 3px solid #f8f8f8',"class"=>"img-responsive")) ?>
				<?php else: ?>
					<?php echo $this->Html->image('noimage.jpg',array('alt'=>$vk1['Gallery'][__('dbname')],'border'=>0,'style'=>'border: 3px solid #f8f8f8',"class"=>"img-responsive")); ?>
				<?php endif ?>
	            </a>
                <div class="text-center">
				<?php echo $this->Html->link($vk1['Gallery'][__('dbname')],array('controller'=>'galleries','action'=>'view',$this->Link->seo($vk1['Gallery']['id'],$vk1['Gallery'][__('dbname')]))) ?>
				</div>
            </div>
	    <?php endforeach ?>

    </div>
</div>


    <div class="container text-center" >

        <div class="row">
            <div class="col-sm-12">
                <div class="pagination">
                    <?php
                    $this->Paginator->options(array('url' => $this->passedArgs));
                    echo $this->Paginator->first( __('<<'), array('tag'=>"li",'escape'=>false), null, array('class' => 'first disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->prev( __('<'), array('tag'=>"li",'escape'=>false), null, array('class' => 'prev disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->numbers(array('separator' => '','tag'=>'li','currentTag'=>'a','currentClass'=>'active',"modulus" => 4,'first' => 1, 'last' => 1,"ellipsis"=>"<a>...</a>"));
                    echo $this->Paginator->next(__('>'), array('tag'=>"li",'escape'=>false), null, array('class' => 'next disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->last(__('>>'), array('tag'=>"li",'escape'=>false), null, array('class' => 'last disabled','tag'=>'a','escape'=>false));
                    ?>
                </div>
            </div>
        </div>
    </div>