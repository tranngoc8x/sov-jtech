<?php
$this->start('facebook');
?>
<?php echo $this->Html->css(array('style1')) ?>
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
<div class="container white-bg">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('NEWS'),array('controller'=>'news','action'=>'index',$this->Link->seo(1,'tin-tuc'))) ?></li>
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('EVENTS'),array('controller'=>'news','action'=>'index')) ?></li>
    </ul>
    <div class="row">

        <div class="col-sm-7">

            <div class="row">
                <div class="col-sm-12">
                    <div class="">
                        <h2 class="titlenews"><?php echo $event['Event'][__('dbname')] ?></h2>
                        <div class="newsmeta" style="margin-bottom:10px; margin-top:10px;">
                            <span class="date"><?php echo __('Ngày đăng:').' '. date('d/m/Y H:i',strtotime($event['Event']['created'])) ?></span>
                            <div class="fb-like" style="float:right;" data-href="<?php echo $this->Html->url(array('controller'=>'events','action'=>'view',$this->Link->seo($event['Event']['id'],$event['Event'][__('dbname')])),true) ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            <div class="clearfix"></div>
                        </div>
                        <hr>
                        <div class="newsdesc">

                            <?php //echo $event['Event']['start_date'] ?>

                        </div>
                        <div class="newcontent">
                            <?php echo $event['Event'][__('dbcontent')] ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" style="">
                    <hr>
                    <div class="fb-like" data-href="<?php echo $this->Html->url(array('controller'=>'events','action'=>'view',$this->Link->seo($event['Event']['id'],$event['Event'][__('dbname')])),true) ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <!-- <div class="fb-comments" data-width="auto" data-href="<?php //echo $this->Html->url(array('controller'=>'news','action'=>'view',$this->Link->seo($news['News']['id'],$news['News'][__('dbname')])),true) ?>" data-numposts="5"></div> -->
                </div>
            </div>
			
            <div class="row">
                <div class="col-sm-12">

                    <div class="">
                        <h3 class="titleother">
						<?php echo $this->Html->link(__('Sự kiện khác:'),array('controller'=>'events','action'=>'index')) ?>
                        </h3>
                        <ul class="otherlist">
                            <?php foreach ($otherevent as $key => $v):?>
                                <li>
                                    <i class="glyphicon glyphicon-menu-right"></i>
                                    <?php echo $this->Html->link($v['Event'][__('dbname')],array('controller'=>'events',"action"=>'view',$this->Link->seo($v['Event']['id'],$v['Event'][__('dbname')])),array('escape'=>false,'html'=>false)) ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-5">
            <div class="blockhotnew">
                <h2 class="headerhotnew"> <?php echo __('HOTNEWS') ?></h2>
                <?php foreach ($hotnews as $kj =>$value): ?>
                    <div class="row">
                        <div class="col-sm-5 col-xs-4">
                            <?php if(is_file('files/uploads/news/'.$value['News']['imagesmall'])): ?>
                                <?php echo $this->Html->link($this->Html->image('/files/uploads/news/'.$value['News']['imagesmall'],array('title'=>$value['News'][__('dbname')],"class"=>"img-responsive")),array('controller'=>'news',"action"=>'view',$this->Link->seo($value['News']['id'],$value['News'][__('dbname')])),array('escape'=>false)) ?>
                            <?php else: ?>
                                <?php echo $this->Html->link($this->Html->image('noimage.jpg',array('title'=>$value['News'][__('dbname')],"class"=>"img-rounded img-responsive")),array('controller'=>'news',"action"=>'view',$this->Link->seo($value['News']['id'],$value['News'][__('dbname')])),array('escape'=>false,'html'=>false)) ?>
                            <?php endif ?>
                        </div>
                        <div class="col-sm-7 col-xs-8 no-padding" style="padding-right: 10px">
                            <?=$this->Html->link($this->Text->truncate($value['News'][__('dbname')],60,array('html'=>false,'exact'=>false)),array('controller'=>'news',"action"=>'view',$this->Link->seo($value['News']['id'],$value['News'][__('dbname')])))?>
                            <p><?=$this->Text->truncate($value['News'][__('dbintrotext')],120,array('html'=>false,'exact'=>false)) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div style="padding-top:20px; padding-bottom:20px;">
                <!---->
                <h3 class="widget-title">Our Facebook Page</h3>
                <div style="max-width:475px; max-height:450px; width:100%">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/taquangbuu.bachkhoa&tabs=timeline&width=475&height=450&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="475" height="450" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </div>
            </div>

        </div>
    </div>

</div>
