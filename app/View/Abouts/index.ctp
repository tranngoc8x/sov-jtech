<div class="container" style="background-color: #fff;">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('ABOUT'),array('controller'=>'abouts','action'=>'index')) ?></li>
    </ul>
</div>

<?php foreach ($abouts as $k=>$v): ?>
    <?php
    $background='';
    if($v['About']['types']==0){
        $background=";background: url('{$this->webroot}files/uploads/abouts/{$v['About']['image']}') no-repeat;background-size:cover;background-position: center center;min-height:{$v['About']['height']}px;";
    ?>
    <div style="background-color: <?=$v['About']['background']!=""?$v['About']['background']: "transparent !important";?> <?=$background?>">
        <div class="container">
           
            <div class="row">
                <div class="col-sm-12 blockabout">
                    <?php echo $v['About'][__('dbdesc')] ?>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="clearfix"></div>
            
        </div>
        <!--/.container -->
    </div>
    <?php }else{ ?>
    <div style="background-color:<?=$v['About']['background']?>" class="clearfix">
        <div class="container" >
            <?php if($v['About']['types']==1){?>
            <div class="row">

                <div class="col-sm-6 hidden-phone no-padding" style="float: none;display: table-cell; vertical-align:middle;background: url('<?=$this->webroot?>files/uploads/abouts/<?=$v['About']['image']?>') no-repeat;background-size: cover;background-position: center center;">
                    <?php echo $this->Html->image('/files/uploads/abouts/'.$v['About']['image'],array('style'=>'opacity:0','class'=>'img-responsive')) ?>
                </div>
                <div class="col-sm-6 m-no-padding jobblock" style="float: none;">
                    <?php echo $v['About'][__('dbdesc')] ?>
                    <?php if($v['About']['readmore'] == 1){ ?>
                    
                    <div align="left">
                            <span class="load-more-button">
                                <?php echo $this->Html->link(__('Xem thêm'."<i class=\"	glyphicon glyphicon-menu-right\"></i> <i class=\"	glyphicon glyphicon-menu-right\"></i>"),array('controller'=>'abouts','action'=>"view",$this->Link->seo($v['About']['id'],$v['About'][__('dbname')])),array('escape'=>false)) ?>
                            </span>
                        </div>
                   <!-- <h3 class="careertitle classtitle2">
                            <?php //echo $this->Html->link(__('FINDMORE'),array('controller'=>'abouts','action'=>"view",$this->Link->seo($v['About']['id'],$v['About'][__('dbname')]))) ?>
                    </h3>-->
                    
                <?php } ?>
                    <div class=" hidden-desktop">
                        <?php echo $this->Html->image('/files/uploads/abouts/'.$v['About']['image'],array('class'=>'img-responsive')) ?>
                    </div>
                </div>
                <!-- /column -->
            </div>
            <?php }elseif($v['About']['types']==2){ ?>
            <div class="row">
                <div class="col-sm-6 m-no-padding jobblock" style="float: none;">
                    <?php echo $v['About'][__('dbdesc')] ?>
                    <?php if($v['About']['readmore'] == 1){ ?>
                    	<div align="left">
                            <span class="load-more-button">
                                <?php echo $this->Html->link(__('Xem thêm'."<i class=\"	glyphicon glyphicon-menu-right\"></i> <i class=\"	glyphicon glyphicon-menu-right\"></i>"),array('controller'=>'abouts','action'=>"view",$this->Link->seo($v['About']['id'],$v['About'][__('dbname')])),array('escape'=>false)) ?>
                            </span>
                        </div>
                        <!--<h3 class="careertitle classtitle2">
                            <?php //echo $this->Html->link(__('FINDMORE'),array('controller'=>'abouts','action'=>"view",$this->Link->seo($v['About']['id'],$v['About'][__('dbname')]))) ?>
                        </h3>-->
                    <?php } ?>
                    <div class="hidden-desktop">
                        <?php echo $this->Html->image('/files/uploads/abouts/'.$v['About']['image'],array('class'=>'img-responsive')) ?>
                    </div>
                </div>
                <div class="col-sm-6 hidden-phone no-padding" style="float: none;display: table-cell; vertical-align:middle;background: url('<?=$this->webroot?>files/uploads/abouts/<?=$v['About']['image']?>') no-repeat;background-size: cover;background-position: center center;">
                    <?php echo $this->Html->image('/files/uploads/abouts/'.$v['About']['image'],array('style'=>'opacity:0','class'=>'img-responsive')) ?>
                </div>
                <!-- /column -->
            </div>
            <?php } ?>
            <!-- /.row -->
            
        </div>
        <!--/.container -->
    </div>

<?php } ?>



<?php endforeach; ?>

