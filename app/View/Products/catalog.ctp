<div class="category-title defaultTitle productlist-title">
        <h1><?php echo $this->Html->link(__('product'),array('controller'=>'products','action'=>'index'),array('escape'=>false)) ?> <img src="<?php echo $this->webroot;?>icons/breadcrumbsep.gif" align="absmiddle" border="0"/> <?php echo $titlename ?></h1>
    </div>
<div class="ProductListContainer ListItems DefaultModule">
    <div id="ProductList" class="defaultContent listing-type-list productlist-content catalog-listing">
        <ul class="ProductList">
            <?php foreach ($catalogs as $k => $v): ?>
            <li>
                <div id="ProductImage" class="ProductImage ProductImageTooltip">
                    <?php echo $this->Html->link($this->Html->image('../files/uploads/products/'.$v['Product']['imagesmall'],array('alt'=>$v['Product'][__('titlename')],'width'=>123,'height'=>'100')),array('plugin'=>false,'controller'=>'products','action'=>'view',$this->Link->seo($v['Product']['id'],$v['Product'][__('titlename')])),
                            array(
                                    'title'         =>  $v['Product'][__('titlename')],
                                    "class"         =>  "product-image",
                                    'escape'        =>  false,
                                    "thumbnail"=>  $this->webroot."files/uploads/products/".$v['Product']['image']."?width=350&amp;height=300",
                                    "thumbnailerror"=>  $this->webroot."files/uploads/products/".$v['Product']['image']."?width=350&amp;height=300",
                                    "productname"   =>  $v['Product'][__('titlename')],
                                    "rel"           =>  $v['Product']['id'],
                                    "class"         =>  "tooltip".$v['Product']['id'],
                                    "description"   => $v['Product'][__('descriptionname')]
                            )) ?>
                </div>
                <div class="ProductDetails">
                    <?php echo $this->Html->link($v['Product'][__('titlename')],array('plugin'=>false,'controller'=>'products','action'=>'view',$this->Link->seo($v['Product']['id'],$v['Product'][__('titlename')])),array('title'=>$v['Product'][__('titlename')],'escape'=>false)) ?>
                </div>
                <div class="ProductActionAdd"><?php echo $this->Html->link(__('detail'),array('plugin'=>false,'controller'=>'products','action'=>'view',$this->Link->seo($v['Product']['id'],$v['Product'][__('titlename')])),array('title'=>$v['Product'][__('titlename')])) ?></div>
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
                    "<div class=\"tooltip_picture\"><img width = \"350px" + "\" src=\"" + thumbnail + "\" onerror=\"this.src='" + thumbnailerror + "'\" title=\"" + productname + "\" alt=\"" + productname + "\" /></div>" +
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