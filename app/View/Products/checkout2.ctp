<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div class="breadcrumb">
                    <?php echo $this->Html->link('Trang chủ',array('controller'=>'products','action'=>'home')); ?>
                    » <?php echo $this->Html->link('Giỏ hàng',array('controller'=>'products','action'=>'cart')); ?>
                    » <?php echo $this->Html->link('Thanh toán',array('controller'=>'products','action'=>'checkout')); ?>
                </div>
                <div id="content" class="wrap-checkout page">
                    <h2 class="page-title">Thanh toán</h2>
                    <div class="checkout page-content">
                        <div id="payment-address">
                            <?php echo $this->Form->create(); ?>
                            <div class="checkout-content" style="display: block;">
                                 <span class="required">
                                <?php echo $this->Session->flash('errorcart'); ?>
                            </span><br>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <h2>Thông tin cá nhân</h2>
                                        <span class="required">*</span> Họ tên:
                                        <br>
                                        <?php echo $this->Form->input('fullname',array('div'=>false,'label'=>false,'class'=>'large-field',"required"=>"required")) ?>
                                        <br>
                                        <br>
                                        <span class="required">*</span> E-Mail:
                                        <br>
                                        <?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'class'=>'large-field',"required"=>"required")) ?>
                                        <br>
                                        <br>
                                        <span class="required">*</span> Điện thoại:
                                        <br>
                                        <?php echo $this->Form->input('telephone',array('div'=>false,'label'=>false,'class'=>'large-field',"required"=>"required")) ?>
                                        <br>
                                    </div>
                                    <div class="span6">
                                        <h2>Địa chỉ</h2>
                                        <span class="required">*</span> Địa chỉ 1:
                                        <br>
                                        <?php echo $this->Form->input('address_1',array('div'=>false,'label'=>false,'class'=>'large-field',"required"=>"required")) ?>
                                        <br>
                                        <br>
                                        Địa chỉ 2:
                                        <br>
                                        <?php echo $this->Form->input('address_2',array('div'=>false,'label'=>false,'class'=>'large-field')) ?>
                                        <br>
                                        <br>
                                        Thành phố:
                                        <br>
                                        <?php echo $this->Form->input('city',array('div'=>false,'label'=>false,'class'=>'large-field')) ?>
                                        <br>
                                    </div>
                                   
                                </div>
                                <div class="row-fluid">
                                     <div class="span12">
                                        <br>
                                        <br>
                                        Mã bảo mật
                                        <br>
                                         <?php
                                            echo $this->Form->input('captcha',array('autocomplete'=>'off','label'=>false,'label'=>false,'div'=>false,'class'=>'form-control span4'));

                                         ?>
                                         <?php
                                         echo $this->Html->image($this->Html->url(array('controller'=>'contacts', 'action'=>'captcha'), true),array('id'=>'img-captcha','vspace'=>2));
                                        echo '<p><a href="javascript:void(0);" id="a-reload">Thử mã khác</a></p>'; ?>
                                    </div>
                                </div>
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
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$('#a-reload').click(function() {
    var $captcha = $("#img-captcha");
    $captcha.attr('src', $captcha.attr('src')+'?'+Math.random());
    return false;
});
</script>