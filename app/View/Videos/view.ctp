<div class="container white-bg">
     <ul class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'videos','action'=>'home')) ?></li>
        <li class="breadcrumb-item active"><?php echo $this->Html->link(__('VIDEO'),array('controller'=>'videos','action'=>'index')) ?></li>
    </ul>

	<div class="row">
		<div class="col-sm-8">
		  <iframe width="100%" class='' height='420px' src="<?php echo str_replace("watch?v=", 'embed/', $video['Video']['path']) ?>" frameborder="0" allowfullscreen style="min-height:210px;overflow: hidden;"></iframe> 
		  	<h4><?php echo $video['Video']['name'] ?></h4>
            <div class="col-sm-12" style="padding-bottom: 10px;">
                <div class="fb-like" data-href="<?php echo $this->Html->url(array('controller'=>'videos','action'=>'view',$this->Link->seo($video['Video']['id'],$video['Video'][__('dbname')])),true) ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                  <div class="fb-comments" data-width="auto" data-href="<?php echo $this->Html->url(array('controller'=>'videos','action'=>'view',$this->Link->seo($video['Video']['id'],$video['Video'][__('dbname')])),true) ?>" data-numposts="5"></div>
            </div>
		 </div>
 		 
		<div class="col-sm-4">
			<div class="row">
				 <h2 class="headerhotnew"> Các video khác:</h2>
				<?php foreach ($othervideo as $key => $value): ?>
				<div class='col-sm-12'>
					<div class="framevideo">
					    <iframe width="100%" src="<?php echo str_replace("watch?v=", 'embed/', $value['Video']['path']) ?>" frameborder="0" allowfullscreen style="min-height:210px;overflow: hidden;"></iframe>
                    </div>
					<?php echo $this->Html->link($value['Video']['name'],array('controller'=>'videos','action'=>'view',$this->Link->seo($value['Video']['id'],$value['Video']['name'])))?>
					<br>
					<br>
				</div>
				<?php endforeach ?>
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