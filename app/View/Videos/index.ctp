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
        <li class="breadcrumb-item active"><?php echo $this->Html->link(__('VIDEO'),array('controller'=>'videos','action'=>'index')) ?></li>
    </ul>

    <div class="row">
        <?php foreach ($videos as $key => $value) :?>

        <div class="col-sm-4">
            <div class="Video_Pro">
                <iframe width="100%" src="<?php echo str_replace("watch?v=", 'embed/', $value['Video']['path']) ?>" frameborder="0" allowfullscreen style="min-height:260px;overflow: hidden;"></iframe> 
                <div style='min-height: 60px'><?php echo $this->Html->link($value['Video']['name'],array('controller'=>'videos','action'=>'view',$this->Link->seo($value['Video']['id'],$value['Video']['name'])))?></div>
            </div>
            <?php if (($key+1) %2 ==0): ?>
            <?php endif ?>

        </div>
        <?php endforeach;?>
    </div>
    <!-- /main -->
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