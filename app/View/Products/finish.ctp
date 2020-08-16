<section id="columns">
    <div class="container">
        <div class="row-fluid">
            <div class="span9 home">
                <div class="breadcrumb">
                    <?php echo $this->Html->link('Trang chủ',array('controller'=>'products','action'=>'home')); ?>
                    » <?php echo $this->Html->link('Giỏ hàng',array('controller'=>'products','action'=>'cart')); ?>
                    » <?php echo $this->Html->link('Hoàn thành',array('controller'=>'products','action'=>'checkout')); ?>
                </div>
                <div id="content" class="wrap-checkout page">
                    <h2 class="page-title">Hoàn thành</h2>
                    <div class="checkout page-content">
                        <div id="payment-address">
                             <div class="checkout-content" style="display: block;">
                                <p>Bạn đã thực hiện đặt hàng thành công. Chúng tôi sẽ liên hệ với bạn ngay để xác nhận việc đặt hàng</p>
                                <p><?php echo $this->Html->link('Trở về trang chủ',array('conntroller'=>'products','action'=>'home')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>