<div class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="opc-wrapper-opc design_package_smartwave design_theme_porto">
                <div class="page-title">
                    <h1>Thông tin cá nhân</h1>
                </div>
                <div class="clear"></div>
				<?php echo $this->Session->flash('errorcart'); ?>
				<?php echo $this->Form->create(); ?>
                <div class="opc-col-left">
                        <div id="co-billing-form">
                            <ul class="form-list">
                                <li id="billing-new-address-form">
                                    <fieldset class="">
                                        <ul>
                                            <li class="fields">
                                                <div class="customer-name">
                                                    <div class="field name-firstname">
                                                        <label class="required"><em>*</em>Họ tên</label>
                                                        <div class="input-box">
                                                            <?php echo $this->Form->input('fullname',array('div'=>false,'label'=>false,'class'=>'input-text required-entry',"required"=>"required")) ?>
                                                        </div>
                                                    </div>
                                                    <div class="field">
														<label class="required"><em>*</em>Email Address</label>
														<div class="input-box">
															<?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'class'=>'input-text required-entry',"required"=>"required")) ?>
														</div>
													</div>
                                                </div>
                                            </li>
                                            <li class="fields">
                                                <div class="customer-name">
                                                    <div class="field">
                                                    <label class="required"><em>*</em>Telephone</label>
                                                    <div class="input-box">
                                                        <?php echo $this->Form->input('telephone',array('div'=>false,'label'=>false,'class'=>'input-text  required-entry',"required"=>"required")) ?>
                                                    </div>
                                                </div>
                                                </div>
                                            </li>
                                            <li class="wide">
                                                <label class="required"><em>*</em>Address</label>
                                                <div class="input-box">
                                                    <?php echo $this->Form->textarea('address_1',array('div'=>false,'label'=>false,'class'=>'input-text  required-entry',"required"=>"required",'style'=>'height: 65px;')) ?>
                                                </div>
                                            </li>
                                            <li class="wide">
                                                <div class="input-box">
                                                    <?php echo $this->Form->textarea('address_2',array('div'=>false,'label'=>false,'class'=>'input-text','style'=>'height: 65px;')) ?>
                                                </div>
                                            </li>
                                            <li class="wide">
                                                <div class="input-box">
                                                    <?php
			                                            echo $this->Form->input('captcha',array('autocomplete'=>'off','label'=>false,'label'=>false,'div'=>false,'class'=>'input-text captcha'));
			                                            echo $this->Html->image($this->Html->url(array('controller'=>'contacts', 'action'=>'captcha'), true),array('id'=>'img-captcha','vspace'=>2));
			                                            echo '<p><a href="javascript:void(0)" id="captreload">Thử mã khác</a></p>';
			                                        ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </fieldset>
                                </li>
                            </ul>
                        </div>
                </div>
                <div class="opc-col-right">
                    <div class="opc-review-actions" id="checkout-review-submit">
                        <!-- <h5 class="grand_total">Tổng tiền: <span class="price"><span class="price"><?php //echo number_format($this->Session->read('tongprice')) ?> đ</span></span></h5> -->
                        <div style="clear: both; padding-top: 15px; border-top: 1px solid #DDDDDD;">
                                    <p>Lưu ý: Chúng tôi sẽ gọi điện với quý khách một lần nữa để xác nhận việc mua hàng.</p>
                                    <br>
                                    <br>
                                    <br>
                                </div>

                                <div class="buttons">
                                    <div class="right">
                                        <?php echo $this->Form->submit("Tiếp tục",array('class'=>'button','div'=>false)); ?>
                                    </div>
                                </div>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function(){
    jQuery('#captreload').click(function() {
        var captcha = jQuery("#img-captcha");
        captcha.attr('src',captcha.attr('src')+'?'+Math.random());
        return false;
    });
});

</script>