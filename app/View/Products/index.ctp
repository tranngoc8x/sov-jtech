<div class="container">
<div class="block">
    <div class="block-title">
        <h3><?php echo $this->Html->link(__('PRODUCT_LIST'),array('controller'=>'products','action'=>'index'),array('escape'=>false)) ?></h3>
    </div>
    <div class="row">

            <?php foreach ($products as $k => $v): ?>
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

        <div class="col-sm-12 ">
            <div class="text-center">
                <ul class="pagination ">
                    <?php
                    $this->Paginator->options(array('url' => $this->passedArgs));
                    $this->Paginator->settings['paramType'] = 'querystring';
                    echo $this->Paginator->first( __('FIRST'), array('tag'=>"li",'escape'=>false), null, array('class' => 'first disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->prev( __('PREV'), array('tag'=>"li",'escape'=>false), null, array('class' => 'prev disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->numbers(array('separator' => '','tag'=>'li','currentTag'=>'a','currentClass'=>'active',"modulus" => 3,'first' => 1, 'last' => 1,"ellipsis"=>"<li><a>...</a></li>"));
                    echo $this->Paginator->next(__('NEXT'), array('tag'=>"li",'escape'=>false), null, array('class' => 'next disabled','tag'=>'a','escape'=>false));
                    echo $this->Paginator->last(__('LAST'), array('tag'=>"li",'escape'=>false), null, array('class' => 'last disabled','tag'=>'a','escape'=>false));
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>