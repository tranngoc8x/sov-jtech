<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SOLARDHC</title>
    <link rel="shortcut icon" href="<?=$this->webroot?>img/favicon.ico" type="image/x-icon" >
    <?php echo $this->Html->css(array('bootstrap','style','exo_response')) ?>
</head>
<body>
<div id="header">
    <div class="container" style="position: relative;">
        <div class="wrap">
            <div id="logo">
             <?php echo $header['Content']['content']?>
             </div>
            <nav class="navbar navbar-default">
                <div id="back_active"></div>
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <div id="navbar-collapse" class="collapse navbar-collapse">
                <?php
                    echo  $this->Menu->menu($nav,array('extenda'=>'','dropdown'=>true,'class'=>"nav menu",'tagAttributes' => array('class'=>'nav navbar-nav navbar-center topmenu'),'liclass'=>'dropdown',"dropdownClass"=>'dropdown-menu'));
                ?>
                </div>
            </nav>
            <!--<div class="lang-selector">-->
            <!--    <?php //echo $this->I18n->flagSwitcher(array( 'id' => 'language-switcher')); ?>-->
            <!--</div>-->
        </div>
    </div>
</div>

<div id="mainconent">
    <?php echo $content_for_layout ?>
    <div class="graybg">
        <div class="container white-bg" style="padding-top: 50px;padding-bottom: 50px;">
            <div class="row">

                <?php foreach ($fphone as $v): ?>
                    <div class="col-sm-4" style="text-align: center">
                        <div class="fphone">
                            <table>
                                <tr>
                                    <td> <?php echo $this->Html->image('support.png') ?></td>
                                    <td><?php echo $v['Content'][__('dbcontent')] ?></td>

                                </tr>   
                            </table>        
                            
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>

            </div>
        </div>
    </div>
 </div>
<!--<div class="container">-->
<!--    <div class="row">-->
<footer>
    <div class="clearfix container">
        <aside class="t3footnav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 ">
                        <div class="foot1">
                            <div class="module-inner">
                                <h4 class="footh4"><?php echo __('CONTACT')?></h4>
                                <?php  echo $footer['Content'][__('dbcontent')];
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="t3-module module foot2">
                            <div class="module-inner">
                                <h4 class="footh4"><?php echo __('INFO')?></h4>
                                <ul class="footer-menu">
                                    <li><?php echo $this->Html->link(__('SERVICE'),['controller'=>'services','action'=>'index'])?></li>
                                    <li><?php echo $this->Html->link(__('NEWS'),['controller'=>'news','action'=>'index'])?></li>
                                    <li><?php echo $this->Html->link(__('CONTACT'),['controller'=>'contacts','action'=>'index'])?></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="t3-module module foot2">
                            <div class="module-inner">
                                <h4 class="footh4"><?php echo __('PRODUCT')?></h4>
                                <ul class="footer-menu">
                                    <?php foreach ($fcatalog as $key => $value) {?>
                                         <li><?php echo $this->Html->link($value['Catalog'][__('dbname')],array('controller'=>'products','action'=>'index',$this->Link->seo($value['Catalog']['id'],$value['Catalog'][__('dbname')]))) ?> </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-3">-->
                    <!--    <div class="t3-module module foot2">-->
                    <!--        <div class="module-inner">-->
                    <!--           <?php// echo $maps['Content'][__('dbcontent')] ?>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->

                </div>
            </div>
        </aside>
    </div>
</footer>
<!--    </div>-->
<!--</div>-->
<div class="td-scroll-up"><i class="td-icon-menu-up"></i></div>

<div class="floatting-bar" style="display: none;">
    <div id="closebar">x</div>
    <div class="fb-like" data-href="<?php echo Router::url( $this->here, true ); ?>" data-layout="box_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
</div>

<div id="openbar"></div>

<?php echo $this->Html->script(array('jquery.min','bootstrap.min')) ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("li.active").parents('li').addClass("active");
        $(".caret").on("click",function () {
            $(".dropdown-menu").slideUp();
            var dropdown = $(this).next();
            if(dropdown.css('display')=='none')
                dropdown.slideDown();
            else dropdown.slideUp();
        });

        $("#closebar").on("click",function () {
            $(".floatting-bar").hide();
            $("#openbar").show();
        });
        $("#openbar").on("click",function () {
            $("#openbar").hide();
            $(".floatting-bar").show();
        })
        var scrollTop = 0;
        setInterval(function() {
            scrollTop = jQuery(window).scrollTop();
            if (scrollTop > 400) {
                jQuery('.td-scroll-up').addClass('td-scroll-up-visible');
            } else {
                jQuery('.td-scroll-up').removeClass('td-scroll-up-visible');
            }
        },500);



        $('.td-scroll-up').each(function(){
            $(this).click(function(){
                jQuery('.td-scroll-up').removeClass('td-scroll-up-visible');
                $('html,body').animate({ scrollTop: 0 }, 'slow');
                return false;
            });
        });




    });
</script>
<?php echo $this->fetch('script') ?>
<?php echo $this->Html->script(array('app')) ?>
<?php 
    echo $this->fetch('facebook');
 ?>
</body>
</html>