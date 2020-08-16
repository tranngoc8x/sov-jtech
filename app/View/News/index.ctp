<div class="container white-bg">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
        <?php if(isset($parent)){ ?>

            <li class="breadcrumb-item "><?php echo $this->Html->link($parent['Catenews'][__('dbname')],array('controller'=>'news','action'=>'index',$this->Link->seo($parent['Catenews']['id'],$parent['Catenews'][__('dbname')]))) ?></li>

        <?php } ?>
        <?php if(isset($catenews)){?>
        <li class="breadcrumb-item active"><?php echo $this->Html->link($catenews['Catenews'][__('dbname')],array('controller'=>'news','action'=>'index',$this->Link->seo($catenews['Catenews']['id'],$catenews['Catenews'][__('dbname')]))) ?></li>
        <?php }?>
    </ul>
    <div class="row" style="padding: 5px 15px;">
            <?php if(count($news) > 1){?>
            <?php foreach ($news as $key => $value):?>
                <div class=" col-md-4 col-sm-4 col-xs-6">
                    <figure class="effect">
                        <?php if(is_file('files/uploads/news/'.$value['News']['imagesmall'])): ?>
                            <?php echo $this->Html->image('/files/uploads/news/'.$value['News']['imagesmall'],array('title'=>$value['News'][__('dbname')]))  ?>
                        <?php else: ?>
                            <?php echo $this->Html->image('noimage.jpg',array('class'=>'img-responsive','title'=>$value['News'][__('dbname')]))  ?>
                        <?php endif ?>
                        <figcaption>
                            <?php echo $this->Html->link(__("VIEWMORE"),array('controller'=>'news',"action"=>'view',$this->Link->seo($value['News']['id'],$value['News'][__('dbname')])),array('escape'=>false)) ?>
                        </figcaption>
                    </figure>
                    <p class="contenttitle">
                    <?php echo $this->Html->link($this->Text->truncate(h($value['News'][__('dbname')]),100,array('html'=>false,'exact'=>false)),array('controller'=>'news','action'=>'view',$this->Link->seo($value['News']['id'],$value['News'][__('dbname')])),array('escape'=>false,'html'=>false)) ?>
                    </p>
                    <p class="contentdesc">
                        <?php echo $this->Text->truncate(h($value['News'][__('dbintrotext')]),120,array('escape'=>false,'html'=>false,'exact'=>false)) ?>
                    </p>
                </div>
            <?php endforeach ?>
            <?php }elseif(count($news) == 1){?>

                <div class="col-sm-12">
                    <div class="">
                        <h2 class="titlenews"><?php echo $news[0]['News'][__('dbname')] ?></h2>
                        <div class="newsmeta" style="margin-bottom:10px; margin-top:10px;">
                            <span class="date"><?php echo __('Ngày đăng:').' '. date('d/m/Y H:i',strtotime($news[0]['News']['publishdate'])) ?></span>
                            <div class="fb-like" style="float:right;" data-href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'view',$this->Link->seo($news[0]['News']['id'],$news[0]['News'][__('dbname')])),true) ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            <div class="clearfix"></div>
                        </div>
                        <hr>
                        <div class="newsdesc"><?php echo $news[0]['News'][__('dbintrotext')] ?></div>
                        <div class="text-center">
                            <?php
                            if($news[0]['News']['showimage']==1 && is_file('files/uploads/news/'.$news[0]['News']['image'])){
                                echo $this->Html->image('/files/uploads/news/'.$news[0]['News']['image'],array('title'=>$news[0]['News'][__('dbname')],'style'=>'width:620px'));
                                echo "<p class='imagedesc'>".$news[0]['News'][__('dbimagedesc')]."</p>";
                            }
                            ?>
                        </div>
                        <div class="newcontent">
                           
                            <?php echo $news[0]['News'][__('dbcontent')] ?>
                        </div>
                    </div>
                </div>

            <?php }else{ ?>

                <div class="col-sm-12"><p class="center-text">Không có bài viết nào để hiển thị !</p></div>
             <?php } ?>

    </div>
    <!-- /main -->
    <div class="row">
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
