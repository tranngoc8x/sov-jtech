<div class="product-view">
    <div class="product-essential">
        <form action="#" method="post" id="product_addtocart_form">
            <input name="form_key" type="hidden" value="LY8sNVAyo23cpfYd">
            <div class="no-display">
                <input type="hidden" name="product" value="143">
                <input type="hidden" name="related_product" id="related-products-field" value="">
            </div>
            <div class="product-img-box col-sm-5">
                <div id="product_images_YTE5N2U1Nzk4MzdmODNkZmIzMTAxMDhlODQ2ZWRmMWI" class="owl-carousel owl-theme owl-middle-narrow" style="opacity: 1; display: block;">
                    <div class="owl-wrapper-outer">
                        <div class="owl-wrapper" style=" left: 10px;top: 20px; display: block;">
                            <div class="owl-item" style="width: 368px;">
                                <div class="item">
                                     <?php echo $this->Html->image('../files/uploads/products/'.$product['Product']['image'],array('title'=>$product['Product']['title'],'alt'=>$product['Product']['title'])); ?>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="clear"></div>
            </div>
            <div class="product-shop col-sm-7">
                <div class="prev-next-products">

                </div>
                <div class="product-name">
                    <h1><?php echo h($product['Product']['title']) ?></h1>
                </div>
                <div class="short-description">
                    <h2>Xem nhanh</h2>
                    <div class="std"><?php echo $product['Product']['description'] ?></div>
                </div>
                <div class="product-info">

                    <div class="price-box">
                        <span class="regular-price" id="product-price-143">
                            <span class="price"><?php if($product['Product']['showprice'] > 0){ ?>
                        <?php if ($product['Product']['discounts'] >0): ?>
                        <span class="price-old"><?php echo number_format(h($product['Product']['price']),0,'.',','); ?> đ</span>
                        <?php endif ?>
                        <span class="price-new"><?php echo number_format(($product['Product']['price'] - $product['Product']['discounts']),0,'.',','); ?> đ</span>
                        <?php }else{echo "<span class='price-new'>Giá liên hệ</span>";} ?></span> </span>
                    </div>
                    <p class="availability in-stock">Tình trạng: <span><?php if(h($product['Product']['number']) >0) echo "Còn hàng";else{echo "Tạm hết hàng";} ?></span>
                    </p>
                    <!-- <p class="email-friend"><a href="#">Gửi cho bạn bè</a></p> -->
                </div>
                <div class="clearer"></div>
                <div class="add-to-box">
                    <div class="add-to-cart">
                        <?php echo $this->Html->link('<span><span><i class="fa fa-chevron-right"></i>Xem chi tiết</span></span>',array('controller'=>'products','action'=>'view',$this->link->seo($product['Product']['id'],$product['Product']['title'])),array('escape'=>false,'title'=>$product['Product']['title'],'class'=>"button btn-cart")) ?>
                    </div>

                </div>
                <ul class="add-to-links">
                        <li>
                            <script src="https://apis.google.com/js/platform.js" async defer>
                              {lang: 'vi'}
                            </script>

                                <style>
                                    #googleplus{display: inline;}
                                    #googleplus > div{vertical-align: top !important;}
                                </style><div id='googleplus'>
                            <div class="g-plusone"></div></div>

                        </li>
                        <li>
                            <?php  $url_share = $this->Html->url(array('controller'=>'products','action'=>'view',$this->Link->seo($product['Product']['id'],$product['Product']['title'])),true); ?>

                            <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo $url_share;?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; width:155px;" allowTransparency="true"></iframe>

                            <div class="clear"></div>
                        </li>

                    </ul>

            </div>

        </form>

    </div>
</div>