
<div class="container white-bg">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
        <!-- <li class="breadcrumb-item"><?php echo $this->Html->link(__('NEWS'),array('controller'=>'news','action'=>'index')) ?></li> -->
        <?php if(isset($parent)){ ?>

            <li class="breadcrumb-item "><?php echo $this->Html->link($parent['Catenews'][__('dbname')],array('controller'=>'news','action'=>'index',$this->Link->seo($parent['Catenews']['id'],$parent['Catenews'][__('dbname')]))) ?></li>

        <?php } ?>
        <li class="breadcrumb-item active"><?php echo $this->Html->link($news['Catenews'][__('dbname')],array('controller'=>'news','action'=>'index',$this->Link->seo($news['Catenews']['id'],$news['Catenews'][__('dbname')]))) ?></li>
    </ul>
    <div class="row">

        <div class="col-sm-7">

            <div class="row">
                <div class="col-sm-12">
                    <div class="">
                        <h2 class="titlenews"><?php echo $news['News'][__('dbname')] ?></h2>
                       <div class="newsmeta" style="margin-bottom:10px; margin-top:10px;">
                           <span class="date"><?php echo __('PUBLISHED_DATE').' '. date('d/m/Y - H:i',strtotime($news['News']['publishdate'])) ?></span>
                           <div class="fb-like" style="float:right;" data-href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'view',$this->Link->seo($news['News']['id'],$news['News'][__('dbname')])),true) ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            <div class="clearfix"></div>
                       </div>
                        <hr>
                        <div class="newsdesc"><?php echo $news['News']['scontent'] ?></div>
                        <div class="text-center">
                        <?php
                        if($news['News']['showimage']==1 && is_file('files/uploads/news/'.$news['News']['image'])){
                            echo $this->Html->image('/files/uploads/news/'.$news['News']['image'],array('title'=>$news['News'][__('dbname')],'style'=>'width:620px'));
                            echo "<p class='imagedesc'>".$news['News'][__('dbimagedesc')]."</p>";
                        }
                        ?>
                        </div>
                        <div class="newcontent">
                        <?php echo $news['News'][__('dbcontent')] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" style="">
                    <hr>
                    <div class="fb-like" data-href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'view',$this->Link->seo($news['News']['id'],$news['News'][__('dbname')])),true) ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                     <div class="fb-comments" data-width="auto" data-href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'view',$this->Link->seo($news['News']['id'],$news['News'][__('dbname')])),true) ?>" data-numposts="5"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                     <div class="block">
                        <div class="block-title">
                            <h3><?php echo $this->Html->link(__("RELATED_NEWS"),array('controller'=>'news','action'=>'index',$this->Link->seo($news['Catenews']['id'],$news['Catenews'][__('dbname')])),array('html'=>false,'escape'=>false)) ?></h3>
                        </div>
                        <ul class="otherlist">
                        <?php foreach ($other as $key => $v):?>
                            <li>
                                <i class="glyphicon glyphicon-menu-right"></i>
                                <?php echo $this->Html->link($v['News'][__('dbname')],array('controller'=>'news',"action"=>'view',$this->Link->seo($v['News']['id'],$v['News'][__('dbname')])),array('escape'=>false,'html'=>false)) ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="blockhotnew">
                <div class="block">
                    <div class="block-title">
                        <h3><?php echo __('HOT_NEWS') ?></h3>
                    </div>
                </div>
                <?php foreach ($hotnews as $kj =>$value): ?>
                    <div class="row">
                        <div class="col-sm-5 col-xs-4">
                            <?php if(is_file('files/uploads/news/'.$value['News']['imagesmall'])): ?>
                                <?php echo $this->Html->link($this->Html->image('/files/uploads/news/'.$value['News']['imagesmall'],array('title'=>$value['News'][__('dbname')],"class"=>"img-responsive")),array('controller'=>'news',"action"=>'view',$this->Link->seo($value['News']['id'],$value['News'][__('dbname')])),array('escape'=>false)) ?>
                            <?php else: ?>
                                <?php echo $this->Html->link($this->Html->image('noimage.jpg',array('title'=>$value['News'][__('dbname')],"class"=>"img-rounded img-responsive")),array('controller'=>'news',"action"=>'view',$this->Link->seo($value['News']['id'],$value['News'][__('dbname')])),array('escape'=>false,'html'=>false)) ?>
                            <?php endif ?>
                        </div>
                        <div class="col-sm-7 col-xs-8 no-padding" style="padding-right: 10px !important;">
                            <?=$this->Html->link($this->Text->truncate($value['News'][__('dbname')],80,array('html'=>false,'exact'=>false)),array('controller'=>'news',"action"=>'view',$this->Link->seo($value['News']['id'],$value['News'][__('dbname')])))?>
                            <p style="padding-right: 10px !important;"><?=$this->Text->truncate($value['News'][__('dbintrotext')],120,array('html'=>false,'exact'=>false)) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div style="padding-top:20px; padding-bottom:20px;">
            <!---->
            <h3 class="widget-title">Our Facebook Page</h3>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/taquangbuu.bachkhoa&tabs=timeline&width=475&height=450&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" data-width="100%" data-height="450px" width="100%" height="450px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
             </div>
             
        </div>
    </div>

</div>
