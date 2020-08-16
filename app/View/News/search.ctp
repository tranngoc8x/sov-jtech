<div class="container white-bg">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>

        <li class="breadcrumb-item active"><?php echo __("SEARCH")  ?></li>
    </ul>
    <?php if(!empty($news)){ ?>
    <div class="row">

        <?php foreach ($news as $key => $value):?>
                <div class=" col-md-4 col-sm-4 col-xs-6">

                <figure class="effect">
                    <?php if(is_file('files/uploads/news/'.$value['News']['imagesmall'])): ?>
                        <?php echo $this->Html->image('/files/uploads/news/'.$value['News']['imagesmall'],array('title'=>$value['News'][__('dbname')]))  ?>
                    <?php else: ?>
                        <?php echo $this->Html->image('noimage.jpg',array('class'=>'img-responsive','title'=>$value['News'][__('dbname')]))  ?>
                    <?php endif ?>
                    <figcaption>
                        <?php echo $this->Html->link(__("VIEWMORE"),array('controller'=>'news',"action"=>'view',$this->Link->seo($value['News']['id'],$value['News'][__('dbname')])),array('escape'=>false)) ?>
                    </figcaption>
                </figure>
                <p class="contenttitle">
                    <?php echo $this->Html->link($this->Text->truncate(h($value['News'][__('dbname')]),60,array('html'=>false,'exact'=>false)),array('controller'=>'news','action'=>'view',$this->Link->seo($value['News']['id'],$value['News'][__('dbname')]))) ?>
                </p>
                <p class="contentdesc">
                    <?php echo $this->Text->truncate(h($value['News'][__('dbintrotext')]),90,array('html'=>false,'exact'=>false)) ?>
                </p>
            </div>
        <?php endforeach ?>

    </div>
    <!-- /main -->
    <div class="row">
        <div class="col-sm-12 ">
            <div class="text-center">
                <ul class="pagination ">
                    <?php
                    $this->Paginator->options(array('url' => $this->passedArgs));
                    $this->Paginator->settings['paramType'] = 'querystring';
                    echo $this->Paginator->first( __('FIRST'), array('tag'=>"li",'escape'=>false), null, array('class' => 'first disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->prev( __('PREV'), array('tag'=>"li",'escape'=>false), null, array('class' => 'prev disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->numbers(array('separator' => '','tag'=>'li','currentTag'=>'a','currentClass'=>'active',"modulus" => 4,'first' => 1, 'last' => 1,"ellipsis"=>"<li><a>...</a></li>"));
                    echo $this->Paginator->next(__('NEXT'), array('tag'=>"li",'escape'=>false), null, array('class' => 'next disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->last(__('LAST'), array('tag'=>"li",'escape'=>false), null, array('class' => 'last disabled','tag'=>'a','escape'=>false));
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php }else{ ?>
        <div class="row">
            <div class="col-sm-12">
                <h3>Không tìm thấy bản ghi phù hợp</h3>
            </div>
        </div>

    <?php } ?>
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