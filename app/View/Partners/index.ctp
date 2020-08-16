<div class="breadcumb">
    <div class="container">
        <ul>
            <li><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?>&raquo;</li>
            <li><?php echo $this->Html->link(__('PARTNER'),array('controller'=>'partners','action'=>'index')) ?></li>
        </ul>
    </div>
</div>
<style>
    .listpartner .col-sm-4:nth-child(3n+1){
        clear: left;
    }
    .listpartner .item{
        margin-bottom: 15px;
    }
    .listpartner .item .feature{
        background: #f0f0f0;
        padding: 5px 0;
    }
</style>
<!-- <div style="background: url('/img/parallax4.jpg')">
 --><div class="container" style="padding-top: 40px;padding-bottom:40px;">
    <h3 class="text-center text-uppercase" style='margin-bottom: 30px;'><?php echo __("FEATUREPARTNER") ?></h3>
        <div class="row listpartner">
    
       
            <?php foreach ($list as $k=>$v): ?>
            <div class="col-sm-4">
            <div class="item">
                <div class="feature">
                    <a href="<?=$v['Partner']['link']?>" target="_blank"><?php echo $this->Html->image("/files/uploads/partners/".$v['Partner']['image'],array('id'=>$v['Partner']['id'],'class'=>'img-responsive','style'=>'margin:0 auto')) ?></a>
                </div>
                <div style="padding-top: 10px" class='text-justify'>
                    <?php echo $v['Partner'][__('dbcontent')] ?>
                </div>
            </div>
            </div>
            <?php endforeach; ?>
         
    </div>

</div>
<!-- </div> -->
    <div class="row">
        <div class="col-sm-12 ">
            <div class="text-center">
                <ul class="pagination ">
                    <?php
                    $this->Paginator->options(array('url' => $this->passedArgs));
                    echo $this->Paginator->first( __('FIRST'), array('tag'=>"li",'escape'=>false), null, array('class' => 'first disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->prev( __('PREV'), array('tag'=>"li",'escape'=>false), null, array('class' => 'prev disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->numbers(array('separator' => '','tag'=>'li','currentTag'=>'a','currentClass'=>'active',"modulus" => 4,'first' => 1, 'last' => 1,"ellipsis"=>"<a>...</a>"));
                    echo $this->Paginator->next(__('NEXT'), array('tag'=>"li",'escape'=>false), null, array('class' => 'next disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->last(__('LAST'), array('tag'=>"li",'escape'=>false), null, array('class' => 'last disabled','tag'=>'a','escape'=>false));
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

 
<?php
    $this->start('script');

 ?>

<script>
//     $('.carousel-boxed11').owlCarousel({
//     loop: false,
//     margin: 0,
//     nav: true,
//     navClass: ['', ''],
//     navText: ['<i class="icon-left-open-big"></i>', '<i class="icon-right-open-big"></i>'],
//     dots: false,
//     responsive: {
//         0: {
//             items: 1
//         },
//         768: {
//             items: 1

//         },
//         992: {
//             items: 1
//         }
//     }
// });
</script>
<?php
    $this->end();
  ?>