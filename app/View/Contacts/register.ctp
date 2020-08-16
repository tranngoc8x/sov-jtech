

<div class="container white-bg">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
            <li class="breadcrumb-item active"><?php echo $this->Html->link(__('Đăng ký'),array('controller'=>'contacts','action'=>'register')) ?></li>
        </ul>
 
    <div class="row" style="margin-top: 10px;">
        <div class="col-sm-6">
            <?php echo $fcontent2['Content'][__('dbcontent')] ?>
        </div>
        <div class="col-lg-6">
            <p><?php echo $this->Session->flash() ?></p>
            
            <?php echo $this->Form->create('Contact',array('class'=>"form-register"));?>
            <h4><span class="student">Thông tin học sinh</span></h4>
            <?php
                echo $this->Form->input('name',array("placeholder"=>"Họ tên",'div'=>array("class"=>'input'),'label'=>false));
                echo $this->Form->input('birthday',array("placeholder"=>"Ngày sinh",'div'=>array("class"=>'input'),'id'=>"date",'label'=>false,'type'=>'text'));
                echo $this->Form->input('school',array('placeholder'=>"Trường Tiểu học/THCS đang học",'div'=>array("class"=>'input'),'label'=>false));
            ?>
            <h4><span class="family">Thông tin phụ huynh</span></h4>
            <?php
                echo $this->Form->input('parents',array('placeholder'=>"Họ tên",'div'=>array("class"=>'input'),'label'=>false));
                echo $this->Form->input('phone',array('placeholder'=>"Số điện thoại",'div'=>array("class"=>'input'),'label'=>false));
                echo $this->Form->input('email',array('placeholder'=>"Địa chỉ Email",'div'=>array("class"=>'input'),'label'=>false));
                echo $this->Form->input('address',array('placeholder'=>"Địa chỉ nhà riêng",'div'=>array("class"=>'input'),'label'=>false));
                echo $this->Form->input('content',array('placeholder'=>"Nội dung cần tư vấn",'div'=>array("class"=>'input'),'label'=>false));
                $this->Captcha->render();
            ?>
                <?php
                    echo $this->Form->submit('Gửi thông tin',array('div'=>false,'class'=>"send-res",'label'=>false));
                 ?>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>
 

<?php $this->start('script') ?>
<?php echo $this->html->script(array('/libs/inputmask/js/jquery.inputmask.bundle')) ?>

    <script>
   jQuery(function($){
    $("#date").inputmask("99/99/9999");
   // $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
    }); 
       jQuery('.creload').on('click', function() {
            var mySrc = $(this).attr('src');
            var glue = '?';
            if(mySrc.indexOf('?')!=-1)  {
                glue = '&';
            }
            $(this).attr('src', mySrc + glue + new Date().getTime());
            return false;
        });
        </script>
<?php $this->end() ?>