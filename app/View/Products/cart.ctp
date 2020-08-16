<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="cart">
                <div class="page-title title-buttons">
                    <h1>Giỏ hàng</h1>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-9">
                        <div class="cart-table-wrap">
                                <fieldset>
                                    <table id="shopping-cart-table" class="data-table cart-table">
                                        <thead>
                                            <tr class="first last">
                                                <th rowspan="1">&nbsp;</th>
                                                <th rowspan="1">&nbsp;</th>
                                                <th rowspan="1"><span class="nobr">Tên sản phẩm</span>
                                                </th>
                                                <th colspan="1"><span class="nobr">Giá sản phẩm</span>
                                                </th>
                                                <th rowspan="1">Số lượng</th>
                                                <th class="last" colspan="1">Thành tiền</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        	<?php
	                                        $tong = 0;

	                                        $listcarts = $this->Session->read('cart');
	                                        foreach ($listcarts as $key => $product): ?>
	                                        <?php
	                                            if($product['showprice'] == 0){
	                                                $product['price'] =0;$product['discounts'] = 0;
	                                            }
	                                        ?>
                                            <tr class="first last odd">
                                                <td class="action-td">

                                                     <?php echo $this->Html->link('<i class="fa fa-remove"></i>',
                                                        array('action'=>'delcartitem',$product['id']),
                                                        array('escape'=>false)
                                                    ); ?>
                                                </td>
                                                <td class="pr-img-td">
                                                     <?php echo $this->Html->link(
                                                $this->Html->image('../files/uploads/products/'.$product['imagesmall'],array('title'=>$product['title'],'alt'=>$product['title'],'width'=>80)),
                                                array('controller'=>'products','action'=>'view',$this->Link->seo($product['id'],$product['title'])),
                                                array('escape'=>false,"class"=>"product-image")
                                            ); ?>
                                                </td>
                                                <td class="product-name-td">
                                                    <h2 class="product-name">
														<?php echo $this->Html->link(
			                                                $product['title'],
			                                                array('controller'=>'products','action'=>'view',$this->Link->seo($product['id'],$product['title'])),
			                                                array('escape'=>false)
			                                            ); ?>
													</h2>
                                                </td>
                                                <td>
                                                    <span class="cart-price"><span class="price"><?php
                                                   		echo number_format($product['price'] - $product['discounts'],0,'.',',');
                                            		?> đ</span></span>
                                                </td>
                                                <td>
                                                    <div class="qty-holder">
                                                        <a href="javascript:void(0)" class="table_qty_dec">-</a>
                                                        <?php echo $this->Form->input("quantity",array('maxlength'=>"12",'size'=>"4",'div'=>false,'class'=>'input-text qty','label'=>false,'value'=>$product['quantity'],'name'=>"data[Product][".$product['id']."][quantity]")) ?>
                                                        <a href="javascript:void(0)" class="table_qty_inc">+</a>
                                                    </div>
                                                </td>
                                                <td class="td-total last">
                                                    <span class="cart-price">

                                                <span class="price"> <?php
                                                        echo number_format(($product['price'] - $product['discounts'])*$product['quantity'],0,'.',',');
                                                        $tong_c = ($product['price'] - $product['discounts'])*$product['quantity'];

                                                    $tong+= $tong_c;
                                                ?> đ</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="first last">
                                                <td colspan="50" class="a-right last">
                                                    </button>
                                                    <?php echo $this->Html->link('Tiếp tục mua hàng',array('controller'=>'products','action'=>'home'),array("class"=>"button btn-continue")) ?>
                                                    <?php echo $this->Html->link('Xóa giỏ hàng',array('controller'=>'products','action'=>'deletecart'),array("class"=>"button btn-empty")) ?>


                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </fieldset>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="cart-collaterals">


                             <div class="totals">
                                <h2>Tổng</h2>
                                <div>
                                    <table id="shopping-cart-totals-table">
                                        <colgroup>
                                            <col>
                                                <col width="1">
                                        </colgroup>
                                        <tfoot>
                                            <tr>
                                                <td style="" class="a-right" colspan="1">
                                                    <strong>Tổng cộng</strong>
                                                </td>
                                                <td style="" class="a-right">
                                                    <strong><span class="price"><?php echo number_format($tong,0,'.',','); ?> đ
                                                    <?php  //$this->Session->write('tongprice',$tong) ?>
                                                    </span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td style="" class="a-right" colspan="1">
                                                    Tổng sản phẩm </td>
                                                <td style="" class="a-right">
                                                    <span class="price"><?php echo number_format($tong,0,'.',','); ?> đ</span> </td>
                                            </tr>
                                            <tr>
                                                <td style="" class="a-right" colspan="1">
                                                    Phí chuyển </td>
                                                <td style="" class="a-right">
                                                    <span class="price">0đ</span> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <ul class="checkout-types">
                                        <li>
                                            <?php echo $this->Html->link('Thanh toán',array('controller'=>'products','action'=>'checkout'),array("class"=>"button btn-proceed-checkout btn-checkout")) ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>