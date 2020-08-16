<div class="category-title defaultTitle productlist-title">
        <h1>Tìm kiếm</h1>
    </div>
<div class="ProductListContainer ListItems DefaultModule">
    <div id="ProductList" class="defaultContent listing-type-list productlist-content catalog-listing">
    <?php echo $this->Paginator->counter(array('format' => __('Có {:count} sản phẩm được tìm thấy')));?>
        <ul class="ProductList">
            <?php foreach ($results as $k => $v): ?>
            <li>
                <div id="ProductImage" class="ProductImage ProductImageTooltip">
                    <?php echo $this->Html->link($this->Html->image('../files/uploads/products/'.$v['Product']['imagesmall'],array('alt'=>$v['Product']['title'],'width'=>123,'height'=>'130')),array('plugin'=>false,'controller'=>'products','action'=>'view',$this->Link->seo($v['Product']['id'],$v['Product']['title'])),
                            array(
                                    'title'         =>  $v['Product']['title'],
                                    "class"         =>  "product-image",
                                    'escape'        =>  false,
                                    "thumbnail"=>  $this->webroot."files/uploads/products/".$v['Product']['image']."?width=350&amp;height=300",
                                    "thumbnailerror"=>  $this->webroot."files/uploads/products/".$v['Product']['image']."?width=350&amp;height=300",
                                    "productname"   =>  $v['Product']['title'],
                                    "rel"           =>  $v['Product']['id'],
                                    "class"         =>  "tooltip".$v['Product']['id'],
                                    "description"   => $v['Product']['description']
                            )) ?>
                </div>
                <div class="ProductDetails">
                    <?php echo $this->Html->link($v['Product']['title'],array('plugin'=>false,'controller'=>'products','action'=>'view',$this->Link->seo($v['Product']['id'],$v['Product']['title'])),array('title'=>$v['Product']['title'],'escape'=>false)) ?>
                </div>
                <div class="ProductPrice">
                    <?php
                    $discount = $v['Product']['discounts'];
                    if ($discount >0): ?>
                    <div class="retail-price disable">
                        <span class="price-label"></span><span class="price"><strike class="RetailPriceValue">
                                <?php echo number_format($v['Product']['price']) ?> đ</strike>
                            </span>
                    </div>
                    <?php endif;?>
                    <div class="special-price">
                        <span class="price-label"></span><span class="price"><em>
                        <?php if ($discount <= 0): ?>
                            <?php echo number_format($v['Product']['price']) ?>
                        <?php else: ?>
                            <?php echo number_format($v['Product']['price'] - $v['Product']['price']*$v['Product']['discounts']/100) ?>
                        <?php endif; ?>
                        đ</em>
                            </span>
                    </div>

                </div>
                <div class="ProductActionAdd"><?php echo $this->Html->link('Chi tiết',array('plugin'=>false,'controller'=>'products','action'=>'view',$this->Link->seo($v['Product']['id'],$v['Product']['title'])),array('title'=>$v['Product']['title'])) ?></div>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<div id="productReviewPopupc" class="hidden"></div>
    <script type="text/javascript">
    $j(function() {
        $j("#ProductList .ProductImageTooltip a").each(function() {
            var productname = $j(this).attr("productname");
            var thumbnail = $j(this).attr("thumbnail");
            var thumbnailerror = $j(this).attr("thumbnailerror");
            var description = $j(this).attr("description");
            $j(this).bind("mouseover", function() {
                var promotionHtml = "";
                var returnHtml =
                    "<div class=\"tooltip_name\">" + productname + '</div>' +
                    "<div class=\"tooltip_picture\"><img src=\"" + thumbnail + "\" onerror=\"this.src='" + thumbnailerror + "'\" title=\"" + productname + "\" alt=\"" + productname + "\" /></div>" +
                    "<div class=\"tooltip_description\">" + description + "</div>" +
                    "<div class=\"teaser\"></div>";
                $j("#productReviewPopupc").html(returnHtml);
            });
            $j(this).tooltip({
                track: true,
                delay: 50,
                showURL: false,
                bodyHandler: function() {
                    return $j("#productReviewPopupc").html();
                }
            });
        });
    });
    </script>
    <div class="Clear"></div>
<div class="PageNavigation" style="padding-bottom: 10px; padding-top: 10px;" align="center">
    <?php
        $this->Paginator->options(array('url' => $this->passedArgs));
        echo $this->Paginator->first( __('<<'), array('tag'=>null,'escape'=>false), null, array('class' => 'first disabled','tag'=>'a','escape'=>false));
        echo $this->Paginator->prev( __('<'), array('tag'=>null,'escape'=>false), null, array('class' => 'prev disabled','tag'=>'a','escape'=>false));
        echo $this->Paginator->numbers(array('separator' => '','tag'=>null,'currentTag'=>'a','currentClass'=>'active',"modulus" => 4,'first' => 1, 'last' => 1,"ellipsis"=>"<a>...</a>"));
        echo $this->Paginator->next(__('>'), array('tag'=>null,'escape'=>false), null, array('class' => 'next disabled','tag'=>null,'escape'=>false));
        echo $this->Paginator->last(__('>>'), array('tag'=>null,'escape'=>false), null, array('class' => 'last disabled','tag'=>null,'escape'=>false));
    ?>
</div>