<?php echo "<?php
/**
 * @author			Trần Ngọc Thắng
 * @link			https://facebook.com/tranngoc8x
 * @version			Cake 2.4

 */
?>";?>

<div class="row-fluid">
<?php if(in_array("image",$fields)){ ?>
<?php echo "\t<?php echo \$this->Form->create('{$modelClass}',array(\"class\"=>\"span12 widget stacked dark form-horizontal bordered\",\"type\"=>\"file\")); ?>\n"; ?>
<?php }else{
	echo "\t<?php echo \$this->Form->create('{$modelClass}',array(\"class\"=>\"span12 widget stacked dark form-horizontal bordered\")); ?>\n";
} ?>
	<header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner"><?php
					foreach ($fields as $field) {
						if (strpos($action, 'add') !== false && $field == $primaryKey) {
							continue;
						} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
							if(strpos($action, 'add') && $field == "status"){
								echo "\n\t\t\t\t<div class=\"control-group\">\n";
				                echo "\t\t\t\t\t<label class=\"control-label\"><?php echo __(\"{$field}\");?></label>\n";
				                echo "\t\t\t\t\t<div class=\"controls\">\n";
				                echo "\t\t\t\t\t\t<?php echo \$this->element(\"libs/status\")?>\n";
				                echo "\t\t\t\t\t</div>\n";
				                echo "\t\t\t\t</div>\n";
							}else if(in_array($action,array("admin_edit",'modified',"update")) && $field == "status"){
								echo "\n\t\t\t\t<div class=\"control-group\">\n";
				                echo "\t\t\t\t\t<label class=\"control-label\"><?php echo __(\"{$field}\");?></label>\n";
				                echo "\t\t\t\t\t<div class=\"controls\">\n";
				                echo "\t\t\t\t\t\t<?php echo \$this->element(\"libs/status_edit\")?>\n";
				                echo "\t\t\t\t\t</div>\n";
				                echo "\t\t\t\t</div>\n";
							}else if(strpos($field, '_id')){
								echo "\n\t\t\t\t<div class=\"control-group\">\n";
				                echo "\t\t\t\t\t<label class=\"control-label\"><?php echo __(\"{$field}\");?></label>\n";
				                echo "\t\t\t\t\t<div class=\"controls\">\n";
				                echo "\t\t\t\t\t\t<?php\n";
				                echo "\t\t\t\t\t\t\techo \$this->Form->input('{$field}', array(\n";
				                echo "\t\t\t\t\t\t\t\t\"div\" => array(\n";
				                echo "\t\t\t\t\t\t\t\t\t\"class\" => \"span12\"\n";
				                echo "\t\t\t\t\t\t\t\t),\n";
				                echo "\t\t\t\t\t\t\t\t\"label\" => false,\n";
				                echo "\t\t\t\t\t\t\t\t\"class\" => \"select2\"\n";
				                echo "\t\t\t\t\t\t\t))\n";
				                echo "\t\t\t\t\t\t?>\n";
				                echo "\t\t\t\t\t</div>\n";
				                echo "\t\t\t\t</div>\n";
							}else if($field=="image"){
								if(in_array($action,array("admin_edit",'modified',"update"))){
								echo "\n\t\t\t\t<?php if(is_file('files/uploads/'.@\$this->request->data[Inflector::singularize(\$this->name)]['image'])){?>";
					            echo "\n\t\t\t\t\t<div class=\"control-group\">";
					            echo "\n\t\t\t\t\t\t<label class=\"control-label\"></label>";
					            echo "\n\t\t\t\t\t\t<div class=\"controls\">";
					            echo "\n\t\t\t\t\t\t\t<div style='margin-bottom: 5px'>";
					            echo "\n\t\t\t\t\t\t\t\t<?php echo \$this->Html->image('../files/uploads/'.\$this->request->data[Inflector::singularize(\$this->name)]['image']);?>";
					            echo "\n\t\t\t\t\t\t\t</div>";
					            echo "\n\t\t\t\t\t\t\t<?php echo \$this->Form->checkbox('remove');?>Xóa ảnh này";
					            echo "\n\t\t\t\t\t\t</div>";
					            echo "\n\t\t\t\t\t</div>";
					            echo "\n\t\t\t\t<?php }?>";
								}
								echo "\n\t\t\t\t<div class=\"control-group\">\n";
				                echo "\t\t\t\t\t<label class=\"control-label\"><?php echo __(\"{$field}\");?></label>\n";
				                echo "\t\t\t\t\t<div class=\"controls\">\n";
				                echo "\t\t\t\t\t\t<div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">\n";
		                        echo "\t\t\t\t\t\t\t<div class=\"input-append\">\n";
		                        echo "\t\t\t\t\t\t\t\t<div class=\"uneditable-input span3\">\n";
		                        echo "\t\t\t\t\t\t\t\t\t<i class=\"icon-file fileupload-exists\"></i>\n";
		                        echo "\t\t\t\t\t\t\t\t\t<span class=\"fileupload-preview\"></span>\n";
		                        echo "\t\t\t\t\t\t\t\t</div>\n";
		                        echo "\t\t\t\t\t\t\t\t<span class=\"btn btn-file\"><span class=\"fileupload-new\">Chọn file</span>\n";
		                        echo "\t\t\t\t\t\t\t\t<span class=\"fileupload-exists\">Đổi</span>\n";
		                        echo "\t\t\t\t\t\t\t\t\t<?php echo \$this->Form->input(\"image\",array(\"type\"=>\"file\",\"label\"=>false,\"div\"=>false)); ?>\n";
		                        echo "\t\t\t\t\t\t\t\t</span>\n";
		                        echo "\t\t\t\t\t\t\t\t<a href=\"#\" class=\"btn fileupload-exists\" data-dismiss=\"fileupload\">Xóa</a>\n";
		                        echo "\t\t\t\t\t\t\t</div>\n";
		                        echo "\t\t\t\t\t\t</div>\n";
				                echo "\t\t\t\t\t</div>\n";
				                echo "\t\t\t\t</div>\n";
							}else{
								echo "\n\t\t\t\t<div class=\"control-group\">\n";
				                echo "\t\t\t\t\t<label class=\"control-label\"><?php echo __(\"{$field}\");?></label>\n";
				                echo "\t\t\t\t\t<div class=\"controls\">\n";
				                echo "\t\t\t\t\t\t<?php\n";
				                echo "\t\t\t\t\t\t\techo \$this->Form->input('{$field}', array(\n";
				                echo "\t\t\t\t\t\t\t\t\"div\" => array(\n";
				                echo "\t\t\t\t\t\t\t\t\t\"title\" => \"{$field}\"\n";
				                echo "\t\t\t\t\t\t\t\t),\n";
				                echo "\t\t\t\t\t\t\t\t\"label\" => false,\n";
				                echo "\t\t\t\t\t\t\t\t\"class\" => \"span12\"\n";
				                echo "\t\t\t\t\t\t\t))\n";
				                echo "\t\t\t\t\t\t?>\n";
				                echo "\t\t\t\t\t</div>\n";
				                echo "\t\t\t\t</div>\n";
				            }
						}
					}
					if (!empty($associations['hasAndBelongsToMany'])) {
						foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
							//echo "\t\t\t\t\techo \$this->Form->input('{$assocName}');\n";
							echo "\n\t\t\t\t<div class=\"control-group\">\n";
				                echo "\t\t\t\t\t<label class=\"control-label\"><?php echo __(\"{$field}\");?></label>\n";
				                echo "\t\t\t\t\t<div class=\"controls\">\n";
				                echo "\t\t\t\t\t\t<?php\n";
				                echo "\t\t\t\t\t\t\techo \$this->Form->input('{$assocName}', array(\n";
				                echo "\t\t\t\t\t\t\t\t\"div\" => array(\n";
				                echo "\t\t\t\t\t\t\t\t\t\"class\" => \"span12\"\n";
				                echo "\t\t\t\t\t\t\t\t),\n";
				                echo "\t\t\t\t\t\t\t\t\"label\" => false,\n";
				                echo "\t\t\t\t\t\t\t\t\"class\" => \"select2\"\n";
				                echo "\t\t\t\t\t\t\t))\n";
				                echo "\t\t\t\t\t\t?>\n";
				                echo "\t\t\t\t\t</div>\n";
				                echo "\t\t\t\t</div>\n";
						}
					}
				?>
			</div>
			<!-- Form Action -->

            <div class="form-actions">
                <?php echo "<?php
                    echo \$this->Form->button(\"Submit\",array(\"type\" => \"submit\",\"class\"=>\"btn btn-primary\",\"div\"=>false));
                    echo \"&nbsp;\";
					echo \$this->Form->button(\"Reset\", array(\"type\" => \"reset\",\"class\"=>\"btn\",\"div\"=>false));
                ?>" ?>
            </div><!--/ Form Action -->
		</section>
	<?php echo "<?php echo \$this->Form->end();?>\n"?>
</div>