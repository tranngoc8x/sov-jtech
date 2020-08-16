<?php
/**
 * @author			Trần Ngọc Thắng
 * @link			https://facebook.com/tranngoc8x
 * @version			Cake 2.4
 */
?>
<div class="row-fluid">
	<?php echo $this->Form->create('Gallery',array("class"=>"span12 widget stacked dark form-horizontal bordered")); ?>
	<header><h4 class="title">Cập nhật thư viện ảnh</h4></header>
        <section class="body">
            <div class="body-inner">
				<div class="control-group">
					<label class="control-label"><?php echo __("Tiêu đề");?></label>
					<div class="controls">
						<?php
							echo $this->Form->hidden('id');
							echo $this->Form->input('name', array(
								"div" => array(
									"title" => "name"
								),
								"label" => false,
								"class" => "span12"
							))
						?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __("Mô tả");?></label>
					<div class="controls">
						<?php
							echo $this->Form->input('description', array(
								"div" => array(
									"title" => "description"
								),
								"label" => false,
								"class" => "ckeditor"
							))
						?>
					</div>
				</div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Ngày đăng");?></label>
                    <div class="controls">
                        <?php
							$d = "";
							if(!empty($this->request->data['Gallery']['published'])) $d =  date('d/m/Y H:i',strtotime($this->request->data['Gallery']['published']));
							echo $this->Form->input('published', array(
								"div" => array(
									"title" => "published"
								),
								"label" => false,
                                'class' =>"datepicker",
                                'style'=>'height: 28px',
                                'type'=>'text',
                                'value'=> $d

							))
						?>
                    </div>
                </div>
				<div class="control-group">
					<label class="control-label"><?php echo __("Trạng thái");?></label>
					<div class="controls">
						<?php
							echo $this->element('libs/statusedit')
						?>
					</div>
				</div>
			</div>
			<!-- Form Action -->
            <div class="form-actions">
                <?php
                    echo $this->Form->button("Submit",array("type" => "submit","class"=>"btn btn-primary","div"=>false));
                    echo "&nbsp;";
					echo $this->Form->button("Reset", array("type" => "reset","class"=>"btn","div"=>false));
                ?>            </div><!--/ Form Action -->
		</section>
	<?php echo $this->Form->end();?>
</div>

<?php echo $this->Html->script('libs/moment') ?>
<link href="//taquangbuu-bk.edu.vn/libs/bootstrap-datetimepicker/css/bootstrap.min.css"  rel="stylesheet" />
<link href="//taquangbuu-bk.edu.vn/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"  rel="stylesheet" />
<script type="text/javascript" src="//taquangbuu-bk.edu.vn/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script>

    $(".datepicker").datetimepicker({
        "sideBySide": true,
        "format": "D/M/Y H:mm"
    });
</script>