<div class="breadcumb">
    <div class="container">
        <ul>
            <li><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?>&raquo;</li>
            <li><?php echo $this->Html->link(__('PARTNER'),array('controller'=>'partners','action'=>'index')) ?></li>
        </ul>
    </div>
</div>
<div class="container" style="padding-top: 40px;padding-bottom:40px">
    <h3 class="text-center">CÁC ĐỐI TÁC TIÊU BIỂU</h3>
<div class="portfolio-grid detailed col4">
    <div class="clearfix"></div>
    <div class="items-wrapper">
        <div class="isotope items" style="position: relative;">
            <?php foreach ($partners as $partner): ?>
            <div class="item partneri">
                <figure>
                <?php if(is_file('files/uploads/partners/'.$partner['Partner']['image'])): ?>
                    <a href="<?php echo $partner['Partner']['link'] ?>" target="_blank">
                        <?php echo  $this->Html->image('/files/uploads/partners/'.$partner['Partner']['image'],array('title'=>$partner['Partner']['name'],"class"=>"img-rounded img-responsive")) ?>

                    </a>

                <?php endif ?>
                </figure>
                <div class="box">
                    <h4 class="post-title" style="margin-top: 20px;">
                        <?php //echo $this->Html->link($partner['Partner']['name'],array('controller'=>'news',"action"=>'view',$this->Link->seo($partner['Partner']['id'],$partner['Partner'][__('dbname')])),array('escape'=>false)) ?>
                        <a href="<?php echo $partner['Partner']['link'] ?>" target="_blank"><?php echo $partner['Partner']['name'] ?></a></span>
                    </h4>
<!--                    <span class="meta category">Website: <a href="--><?php //echo $partner['Partner']['link'] ?><!--" target="_blank">--><?php //echo $partner['Partner']['link'] ?><!--</a></span> -->
                <!--/.box -->
                </div>
            </div>
            <?php endforeach; ?>
        <!--/.isotope -->
        </div>
    </div>
     <!--/.items-wrapper -->
</div>
</div>