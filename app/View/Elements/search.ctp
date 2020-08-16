<div class="ProductListContainer ListItems DefaultModule">
    <div id="ProductList" class="defaultContent listing-type-list productlist-content catalog-listing">
    <div class="AdvanceSearch">
        <h3 class="Clear" style="">
            <?php echo __('fliterinfor') ?></h3>
        <div class="FormContainer HorizontalFormContainer NarrowFormContainer PL20">
        <?php echo $this->Form->create('Product',array('action'=>'search','type'=>'get')) ?>

            <dl>
                <dt><?php echo __('keyword') ?>:</dt>
                <dd>
                <?php echo $this->Form->input('q',array('id'=>"txtSearch",'class'=>'NormalTextBox','div'=>false,'label'=>false,'style'=>'width:350px')) ?>
                </dd>
                <dt><?php echo __('catalog') ?>:</dt>
                <dd>
                    <div id="category" class="ISSelect Field250 ISSelectReplacement ISSelectAlreadyReplaced" style="height: 150px; width: 355px;">
                        <ul>
                        <?php echo $this->Form->hidden('catalogs',array('name'=>'catalogs','id'=>'catalogs','value'=>'0')) ?>
                            <?php  $mainmenu1    = $this->requestAction('catalogs/menu'); ?>
                            <?php foreach ($mainmenu1 as $kmenu => $vmenu1): ?>
                            <?php if(empty($vmenu1['children'])){?>
                            <li>
                            <?php }else{ ?>
                                <li class="level0">
                            <?php } ?>
                                <?php echo $this->Form->input('catalogs_id',array('name'=>false,'class'=>'checkCat','type'=>'checkbox','div'=>false,'label'=>false,'value'=>$vmenu1['Catalog']['id'])) ?>
                                <?php echo $vmenu1['Catalog'][__('catalogname')]; ?>
                                <?php if(!empty($vmenu1['children'])){?>
                                    <div class="nav-sublist-dropdown" style="display: none;">
                                        <div class="container">
                                            <ul>
                                                <?php $menulv1 = $vmenu1['children']; ?>
                                                <?php foreach ($menulv1 as $kvl1 => $vlv1) {?>
                                                <?php if(empty($vmenu1['children'])){?>
                                                <li class="menu-item">
                                                <?php }else{ ?>
                                                    <li class="level1">
                                                <?php } ?>
                                                     <?php echo $this->Form->input('catalogs_id',array('name'=>false,'class'=>'checkCat','type'=>'checkbox','div'=>false,'label'=>false,'value'=>$vlv1['Catalog']['id'])) ?>
                                                        <?php echo $vlv1['Catalog']['name']; ?>
                                                            <?php if(!empty($vlv1['children'])){?>
                                                            <?php $menulv2 = $vlv1['children']; ?>
                                                            <div class="nav-sublist level1">
                                                                <ul>
                                                                    <?php foreach ($menulv2 as $klv2 => $vlv2): ?>
                                                                    <li class="menu-item">
                                                                    <?php echo $this->Form->input('catalogs_id',array('name'=>false,'class'=>'checkCat','type'=>'checkbox','div'=>false,'label'=>false,'value'=>$vlv2['Catalog']['id'])) ?>
                                                                        <?php echo $vlv2['Catalog']['name']; ?>
                                                                    </li>
                                                                    <?php endforeach ?>
                                                                </ul>
                                                            </div>
                                                            <?php } ?>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </dd>
            </dl>
            <hr>
        </div>
        <!-- <h3 class="Clear" style="">
            Tìm theo giá</h3>
        <div class="FormContainer HorizontalFormContainer NarrowFormContainer PL20">
            <dl>
                <dt>Khoảng giá:</dt>
                <dd>
                    Từ
                    <?php //echo $this->Form->input('p_from',array('id'=>"txtSearch",'class'=>'NormalTextBox','div'=>false,'label'=>false,'style'=>'width:70px')) ?>
                    đến
                    <?php //echo $this->Form->input('p_to',array('id'=>"txtSearch",'class'=>'NormalTextBox','div'=>false,'label'=>false,'style'=>'width:70px')) ?>
                </dd>
            </dl>
            <hr>
        </div> -->
        <h3 class="Clear" style="">
            <?php echo __('otherfilter') ?></h3>
        <div class="FormContainer HorizontalFormContainer NarrowFormContainer PL20">
            <dl>
                <dt><?php echo __('featureproduct') ?>: </dt>
                <dd class='s1'>
                    <?php echo $this->Form->checkbox('hot',array('div'=>false,'label'=>false)) ?>
                </dd>
                <dt><?php echo __('newproduct') ?>: </dt>
                <dd class='s1'>
                    <?php echo $this->Form->checkbox('newsp',array('div'=>false,'label'=>false)) ?>
                </dd>
                <dt><?php echo __('saleproduct') ?>: </dt>
                <dd class='s1'>
                    <?php echo $this->Form->checkbox('discounts',array('div'=>false,'label'=>false)) ?>
                </dd>
                <dt></dt>
                <dd>
                    <?php echo $this->Form->submit(__('search')) ?>
                </dd>
            </dl>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
    </div>
</div>
<div class="Clear"></div>
<?php echo $this->Html->script(array('jquery-1.9.0.min')) ?>
<script>
    $(document).ready(function(){
        $('.checkCat').click(function(){
            t= $("#catalogs").attr('value');
            val = this.value;
            if(this.checked == true){
                $("#catalogs").val(t+','+val);
            }else{
                x = t.replace(','+val,"");
                $("#catalogs").val(x);
            }
        });
    });
</script>