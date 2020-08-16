<?php
/**
 * @author			Trần Ngọc Thắng
 * @link			https://facebook.com/tranngoc8x
 * @version			Cake 2.4

 */
?>
<div class="row-fluid">
	<?php echo $this->Form->create('Gallery',array("class"=>"span12 widget stacked dark form-horizontal bordered")); ?>
	<header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner">
				<div class="control-group">
					<label class="control-label"><?php echo __("id");?></label>
					<div class="controls">
						<?php
							echo $this->Form->input('id', array(
								"div" => array(
									"title" => "id"
								),
								"label" => false,
								"class" => "span12"
							))
						?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo __("name");?></label>
					<div class="controls">
						<?php
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
					<label class="control-label"><?php echo __("description");?></label>
					<div class="controls">
						<?php
							echo $this->Form->input('description', array(
								"div" => array(
									"title" => "description"
								),
								"label" => false,
								"class" => "span12"
							))
						?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo __("status");?></label>
					<div class="controls">
						<?php
							echo $this->Form->input('status', array(
								"div" => array(
									"title" => "status"
								),
								"label" => false,
								"class" => "span12"
							))
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