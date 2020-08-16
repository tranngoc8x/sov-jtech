<div class="row-fluid">
	<?php echo $this->Form->create("Contact",array("class"=>"span12 widget stacked dark form-horizontal bordered"));?>
        <header><h4 class="title">Thông tin liên hệ</h4></header>
        <section class="body">
            <div class="body-inner">
                <div class="control-group">
                    <label class="control-label"><b><?php echo __("Họ tên học sinh:");?></b></label>
                    <div class="controls" style='padding-top: 5px;'>
                       <?php echo h($contact['Contact']['name']); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><b><?php echo __("Ngày sinh:");?></b></label>
                    <div class="controls" style='padding-top: 5px;'>
                       <?php echo date("d/m/Y",strtotime($contact['Contact']['birthday'])); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><b><?php echo __("Trường Tiểu học/THCS đang học:");?></b></label>
                    <div class="controls" style='padding-top: 5px;'>
                       <?php echo h($contact['Contact']['school']); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><b><?php echo __("Họ tên phụ huynh:");?></b></label>
                    <div class="controls" style='padding-top: 5px;'>
                       <?php echo h($contact['Contact']['parents']); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><b>Email:</b></label>
                    <div class="controls" style='padding-top: 5px;'>
                        <a target:="_blank" href="mailto:<?php echo h($contact['Contact']['email']); ?>"><?php echo h($contact['Contact']['email']); ?></a>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><b>Số điện thoại:</b></label>
                    <div class="controls" style='padding-top: 5px;'>
                        <?php echo h($contact['Contact']['phone']); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><b>Địa chỉ nhà riêng::</b></label>
                    <div class="controls" style='padding-top: 5px;'>
                        <?php echo h($contact['Contact']['address']); ?>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label"><b>Nội dung:</b></label>
                    <div class="controls" style='padding-top: 5px;'>
                        <?php echo h($contact['Contact']['content']); ?>
                    </div>
                </div>

            </div>
        </section>
    </form>
</div>