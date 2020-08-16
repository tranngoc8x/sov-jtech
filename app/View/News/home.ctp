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
<?php  $this->end()?>
<?php $this->start('script') ?>
<?php echo $this->Html->css(array('nivo-slider' )) ?>
<?php echo $this->Html->script(array('jquery.nivo.slider')) ?>
<link rel="stylesheet" href="/libs/OwlCarousel/assets/owl.carousel.css" />
<link rel="stylesheet" href="/libs/OwlCarousel/assets/owl.theme.green.css" />
<script type="text/javascript" src="/libs/OwlCarousel/owl.carousel.min.js"></script>
 <script type="text/javascript">

    $('#slider').nivoSlider({
        controlNav: true,
        directionNav: true
    });

    // $('#slider2').nivoSlider({
    //     controlNav: true,
    //     directionNav: true
    // });
    $(document).ready(function(){
        $('.owl-product').owlCarousel({
            margin: 10,
            loop: true,
            nav: true,
            navText: ["<span class=\"glyphicon glyphicon-menu-left\"></span>","<span class=\"glyphicon glyphicon-menu-right\"></span>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });

        $('.owl-partner').owlCarousel({
            margin: 12,
            loop: true,
            nav: true,
            navText: ["<span class=\"glyphicon glyphicon-menu-left\"></span>","<span class=\"glyphicon glyphicon-menu-right\"></span>"],
            dots: false,
            autoWidth: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });
     });

</script>
<?php $this->end() ?>

<div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider ">
        <?php
        $arrslider = array();
        foreach ($sliders as $ksy=> $slider): ?>
            <?php
            $linkslider = "";
            $titleslider = "";

            if(!$slider['News']['id'] == null){
                $linkslider = $this->Html->url(array('controller'=>'news','action'=>'view',$this->Link->seo($slider['News']['id'],$slider['News'][__('dbname')])),true);
                if($slider['Slider']['hotnews']!=1){
                    $arrslider[] = $slidernews;
                    $titleslider = "title='#htmlcaption{$slider['Slider']['link']}'";
                }
            }
            ?>
            <?php if( $slider['News']['id'] != null){ ?>
                <a href="<?php echo $linkslider?>">
                    <img src="<?=$this->webroot?>files/uploads/slider/<?=$slider['Slider']['image']?>" <?php echo $titleslider?> />
                </a>
            <?php }else{ ?>
                <img src="<?=$this->webroot?>files/uploads/slider/<?=$slider['Slider']['image']?>"   <?php echo $titleslider?>/>
            <?php } ?>
        <?php endforeach; ?>
    </div>
    <?php foreach ($arrslider as $kcap => $slidercap): ?>

        <div id="htmlcaption<?php echo $slidercap['News']['id']?>" class="nivo-html-caption">
            <div class="main-caption">
                <h3><?php echo $this->Html->link($slidercap['News'][__('dbname')],array('controller'=>'news','action'=>'view',$this->Link->seo($slidercap['News']['id'],$slidercap['News']['name']))) ?></h3>
                    <?php  echo $slidercap['News'][__('dbintrotext')];
                    ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
 
<div id="abouts">
<?php echo $this->element('about') ?>
</div>
<div class="freatureSP">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="products block">
                    <div class="block-title">
                        <h3><?php echo $this->Html->link(__('NEW_PRODUCT'),array('controller'=>'news','action'=>'index'));?></h3>
                    </div>
                    <div class="owl-product owl-carousel owl-theme">
                        <?php
                            foreach ($hproducts as $k=>$vf):
                        ?><div class="item">
                                <figure>
                                    <?php echo $this->Html->image("../files/uploads/products/{$vf['Product']['imagesmall']}",array('title'=>$vf['Product']['title'],'url'=>array('controller'=>'products','action'=>'view',$vf['Product']['id'])))?>
                                    <figcaption>
                                        <h2> <?php echo $this->Html->link($vf['Product'][__('dbtitle')],array('controller'=>'products','action'=>'view',$this->Link->seo($vf['Product']['id'],$vf['Product'][__('title')])));?></h2>
                                    </figcaption>
                                </figure>
                                <div class="product-header"> <?php echo $this->Html->link($vf['Product'][__('dbtitle')],array('controller'=>'products','action'=>'view',$this->Link->seo($vf['Product']['id'],$vf['Product'][__('title')])));?></div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="news-homepage">
    <div class="container">
        <div class="block">
            <div class="block-title">
            <h3><?php echo $this->Html->link(__("NEWS"),array('controller'=>'news','action'=>'index'));?></h3>
        </div>
            <div class="row">
                <?php foreach ($hotnews as $v) :?>
                <div class="col-sm-6 col-xs-12">
                    <div class="item-news clearfix">
                        <a class="item-img" href="<?php echo $this->Html->url(array('controller'=>'news',"action"=>'view',$this->Link->seo($v['News']['id'],$v['News'][__('dbname')]))) ?>">
                            <?php if(is_file('files/uploads/news/'.$v['News']['imagesmall'])): ?>
                                <?php echo $this->Html->image('/files/uploads/news/'.$v['News']['imagesmall'],array('class'=>'img-responsive attachment-techedu_class_image size-techedu_class_image wp-post-image','title'=>$v['News'][__('dbname')]))  ?>
                            <?php else: ?>
                                <?php echo $this->Html->image('noimage.png',array('class'=>'img-responsive attachment-techedu_class_image size-techedu_class_image wp-post-image','title'=>$v['News'][__('dbname')]))  ?>
                            <?php endif ?>
                        </a>
                        <div class="item-title">
                            <?php echo $this->Html->link($v['News'][__('dbname')],array('controller'=>'news',"action"=>'view',$this->Link->seo($v['News']['id'],$v['News'][__('dbname')])),array('escape'=>false)) ?>
                        </div>
                        <div class="item-desc">
                            <?php echo $this->Text->truncate($v['News'][__('dbintrotext')],140,array('exact'=>false,'html' => false)) ?>
                        </div>

                    </div>

                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div class="partner block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="block-title">
                    <h3><?php echo $this->Html->link(__("PARTNER"),array('controller'=>'news','action'=>'index'));?></h3>
                </div>
                <div class="owl-partner owl-carousel owl-theme">
                    <?php foreach ($partners as $partner) :?>
                        <div class="item">
                            <a href="<?php echo $partner['Partner']['link'];?>" target=""><img src="<?php echo $this->webroot.'files/uploads/partners/'.$partner['Partner']['image'];?>" /></a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>