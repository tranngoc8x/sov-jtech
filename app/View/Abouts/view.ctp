<div class="container" style="background-color:#FFF">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('ABOUT'),array('controller'=>'abouts','action'=>'index')) ?></li>
        <li class="breadcrumb-item active"><?php echo $this->Html->link($about['About'][__('dbname')],array('controller'=>'abouts','action'=>'view',$this->Link->seo($about['About']['id'],$about['About'][__('dbname')]))) ?></li>
    </ul>
    <div class="row" >
        <div class="col-sm-12">
            <?php echo $about['About'][__('dbcontent')] ?>
        </div>
        <!-- /column -->
    </div>
    <!-- /.row -->
    <div class="row">
                <div class="col-sm-12" style="">
                    <hr>
                    <div class="fb-like" data-href="<?php echo $this->Html->url(array('controller'=>'abouts','action'=>'view',$this->Link->seo($about['About']['id'],$about['About'][__('dbname')])),true) ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                     <!--<div class="fb-comments" data-width="auto" data-href="<?php //echo $this->Html->url(array('controller'=>'abouts','action'=>'view',$this->Link->seo($about['About']['id'],$about['About'][__('dbname')])),true) ?>" data-numposts="5"></div> -->
                </div>
            </div>
    <div class="row">
                <div class="col-sm-12">

                    <div class="">
                        <h3 class="titleother">
						<?php echo $this->Html->link(__('Giới thiệu khác:'),array('controller'=>'abouts','action'=>'index')) ?>
                        </h3>
                        <ul class="otherlist">
                            <?php foreach ($otherabout as $key => $v):?>
                                <li>
                                    <i class="glyphicon glyphicon-menu-right"></i>
                                    <?php echo $this->Html->link($v['About'][__('dbname')],array('controller'=>'abouts',"action"=>'view',$this->Link->seo($v['About']['id'],$v['About'][__('dbname')])),array('escape'=>false,'html'=>false)) ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
    <div class="clearfix"></div>
</div>
        <!--/.container -->
