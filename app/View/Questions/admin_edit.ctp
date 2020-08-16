<?php
/**
 * @author			Trần Ngọc Thắng
 * @link			https://facebook.com/tranngoc8x
 * @version			Cake 2.4
 */
?>
<div class="row-fluid">
	<?php echo $this->Form->create('Question',array("class"=>"span12 widget stacked dark form-horizontal bordered",'type'=>'file')); ?>
	<header><h4 class="title">Cập nhật bài viết</h4></header>
        <section class="body">
            <div class="body-inner">
				<div class="control-group">
					<?php echo __("Họ tên người hỏi");?>:
						<?php
						    echo $this->Form->hidden('id');
							echo $this->request->data['Question']['name'];
						?>
				</div>
                <div class="control-group">
                    <?php echo __("Điện thoại");?>:
                        <?php
                        echo $this->request->data['Question']['phone'];
                        ?>
                </div>
                <div class="control-group">
                     <?php echo __("Email");?>:
                        <?php
                        echo $this->request->data['Question']['email'];
                        ?>
                </div>
                <div class="control-group">
                    <label><?php echo __("Nội dung câu hỏi");?></label>
                        <?php
                        echo $this->request->data['Question']['content'];
                        ?>
                </div>
				<div class="control-group">
					<label class="control-label"><?php echo __("Nội dung trả lời");?></label>
					<div class="controls">
						<?php
							echo $this->Form->input('reply', array(
								"div" => array(
									"title" => "content"
								),
								"label" => false,
								'type'=>'textarea',
								"class" => "span12 ckeditor"
							))
						?>
					</div>
				</div>
				<div class="control-group">
                    <label class="control-label">Trạng thái</label>
                    <div class="controls">
                        <?php
                            echo $this->element("libs/statusedit");
                        ?>
                    </div>
                </div>
			</div>


            <div class="control-group">
                <label class="control-label"><?php echo __("Là câu hỏi thường gặp");?></label>
                <div class="controls" align="left">
                    <?php
                    echo $this->Form->checkbox('types'
                        , array(
                            "div" => array(
                                "title" => "showhome"
                            ),
                            "label" => false,
                            "class" => "span4",
                            'empty'=>false,
                            'type'=>'checkbox'
                        ))
                    ?>
                </div>
            </div>


            <div class="form-actions">
                <?php
                    echo $this->Form->button("Submit",array("type" => "submit","class"=>"btn btn-primary","div"=>false));
                    echo "&nbsp;";
					echo $this->Form->button("Reset", array("type" => "reset","class"=>"btn","div"=>false));
                ?>            </div><!--/ Form Action -->
		</section>
	<?php echo $this->Form->end();?>
</div>