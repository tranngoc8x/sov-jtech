<div class="container">
    <div class="block">
        <div class="block-title">
            <h3><?php echo $this->Html->link(__('PRODUCT'),array('controller'=>'products','action'=>'index'),array('escape'=>false)) ?>
                <span class="glyphicon glyphicon-menu-right"></span>
                <?php echo $product['Catalog'][__('dbname')] ?></h3>
        </div>

        <div class="row">
            <div class="col-lg-8 col-sm-8 col-xs-12">
                <div class="product-img">
                    <?php echo $this->Html->image('../files/uploads/products/'.$product['Product']['imagesmall'],array('class'=>'img-responsive')) ?>
                </div>
                <div class="product-infos">
                    <div id="exTab2"  >
                        <ul class="nav nav-tabs">

                            <li class="active"><a href="#congdung" data-toggle="tab">Thông tin sản phẩm</a></li>
                            <li><a href="#review" data-toggle="tab">Đánh giá</a></li>
                        </ul>

                        <div class="tab-content ">
                            <div class="tab-pane active" id="congdung">
                                <?php echo $product['Product']['content'];?>
                            </div>
                            <div class="tab-pane" id="review">
                                <div class="col-sm-12">
                                    <div class="fb-like" data-href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'view',$this->Link->seo($product['Product']['id'],$product['Product'][__('dbtitle')])),true) ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                    <div class="fb-comments" data-width="auto" data-href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'view',$this->Link->seo($product['Product']['id'],$product['Product'][__('dbtitle')])),true) ?>" data-numposts="5"></div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <h3 class="product-title"><?php echo $product['Product'][__('dbtitle')] ?></h3>
                <div class="product-desc">
                    <?php echo $product['Product'][__('dbdescription')] ?>
                </div>
            </div>

        </div>
    </div>
    <div class="block">
        <div class="block-title">
            <h3>Sản phẩm cùng loại</h3>
        </div>
        <div class="row">
            <?php foreach ($sameProducts as $k => $v): ?>
                <div class="col-md-3 col-sm-4 col-xs-6">
                    <figure class="product-item">
                        <?php echo $this->Html->link($this->Html->image('../files/uploads/products/'.$v['Product']['imagesmall'],array('class'=>'img-responsive','alt'=>$v['Product']['title'] )),array('plugin'=>false,'controller'=>'products','action'=>'view',$this->Link->seo($v['Product']['id'],$v['Product'][__('dbtitle')])),
                            array(
                                'title'         =>  $v['Product'][__('dbtitle')],
                                "class"         =>  "product-image",
                                'escape'        =>  false,
                            )) ?>
                        <figcaption>
                            <?php echo $this->Html->link($v['Product'][__('description')],array('controller'=>'products',"action"=>'view',$this->Link->seo($v['Product']['id'],$v['Product'][__('dbtitle')])),array('escape'=>false)) ?>
                        </figcaption>

                    </figure>
                    <div class="contenttitle" style="text-align: center;margin-top: 10px;">
                        <?php echo $this->Html->link($v['Product'][__('dbtitle')],array('plugin'=>false,'controller'=>'products','action'=>'view',$this->Link->seo($v['Product']['id'],$v['Product'][__('dbtitle')])),array('title'=>$v['Product'][__('dbtitle')],'escape'=>false)) ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
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

