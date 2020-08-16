<!-- <div class="page-header line1">
    <h4>Quản lý nội dung</h4>
</div> -->
<!-- START Row -->
<div class="row-fluid">
    <!-- START Datatable 2 -->
    <div class="span12 widget dark">
        <header>
            <h4 class="title pull-left"><span class="icon icone-list"></span></h4>
            <!-- START Button Group -->
            <div class="btn-group pull-left">
				<?php echo '<?php echo $this->Html->link("<span class=\"icone-trash\"></span>&nbsp;&nbsp;Xóa các mục đã chọn","javascript:void(0);",array("class"=>"btn btn-danger","id"=>"chkAll","escape"=>false));?>'."\n";?>
            </div>
            <div class="btn-group pull-right">
				<?php echo '<?php echo $this->Html->link("<span class=\"icone-edit\"></span>&nbsp;&nbsp;Thêm mới",array("action"=>"add"),array("class"=>"btn btn-success","escape"=>false));?>'."\n";?>
            </div>
            <!--/ END Button Group -->
        </header>
		<section class="body">
			<div class="body-inner no-padding">
                <div class="row-fluid headbar">
                    <?php echo "<?php echo \$this->Form->create('frm',array('type' => 'post'));?>\n";?>
                    <div class="span12 filter pull-right">
                        <div class="dataTables_filter">
                            <label>
                                <div style="margin-top: 1px; display:inline-table;">
                                    <?php echo "<?php echo \$this->Form->input('catenews_id',array('label'=>false,'class'=>\"select2\",\"div\"=>false,'empty'=>true));?>\n";?>
                                    &nbsp;
                                     <?php echo "<?php echo \$this->element(\"libs/_ajax_status_index\");?>\n";?>
                                </div>
                                 <?php echo "<?php echo \$this->Form->input('s',array(\"label\"=>false,\"div\"=>false));?>\n";?>
                                 <?php echo "<?php echo \$this->Form->submit(\"&nbsp;Tìm kiếm\",array(\"class\"=>\"btn icone-search btn-smalluccess\",\"div\"=>false,\"escape\"=>false));?>\n";?>
                            </label>
                        </div>
                    </div>
                     <?php echo "<?php echo \$this->Form->end();?>\n";?>
                </div>
				<table class="table table-bordered table-striped table-hover datatable">
					<thead class="sorting">
						<tr><?php
							foreach ($fields as $field):
								if($field == "id")
									echo "\n\t\t\t\t\t\t<th width=\"5%\"><input type=\"checkbox\"></th>\n";
								else
									echo "\t\t\t\t\t\t<th><?php echo \$this->Paginator->sort('{$field}',__('{$field}')); ?></th>\n";
							endforeach;
							?>
							<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
						</tr>
					</thead>
					<tbody>
					<?php
					echo "<?php foreach (\${$pluralVar} as \$k => \$v): ?>\n";
					echo "\t\t\t\t\t\t<tr>\n";
					foreach ($fields as $field) {
						$isKey = false;
						if (!empty($associations['belongsTo'])) {
							foreach ($associations['belongsTo'] as $alias => $details) {
								if ($field === $details['foreignKey']) {
									$isKey = true;
									echo "\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t<?php echo \$this->Html->link(\$v['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \$v['{$alias}'][\"{$details['primaryKey']}\"])); ?>\n\t\t\t\t\t\t</td>\n";
									break;
								}
							}
						}
						if ($isKey !== true) {
							if($field=="status"){
								echo "\t\t\t\t\t\t".'<td class="center">'."\n";
								echo "\t\t\t\t\t\t\t".'<div id="togglediv_<?php echo $v[Inflector::singularize($this->name)][\'id\'].\'_\'.$v[Inflector::singularize($this->name)][\'status\'].\'_\'.$this->request->params[\'controller\'];?>" class="toggle_div">'."\n";
								echo "\t\t\t\t\t\t\t\t".'<?php if($v[Inflector::singularize($this->name)][\'status\'] == 1){?>'."\n";
								echo "\t\t\t\t\t\t\t\t".'<span data-content="2" id="toggle_div_span_<?php echo $v[Inflector::singularize($this->name)][\'id\'];?>" title="Ẩn" class=\'icon icone-remove red pointer\'></span>'."\n";
								echo "\t\t\t\t\t\t\t\t".'<?php }else{?>'."\n";
								echo "\t\t\t\t\t\t\t\t".'<span data-content="1" id="toggle_div_span_<?php echo $v[Inflector::singularize($this->name)][\'id\'];?>"  title="Hiển thị" class=\'icon icone-ok green pointer\'></span>'."\n";
								echo "\t\t\t\t\t\t\t\t".'<?php }?>'."\n";
								echo "\t\t\t\t\t\t\t</div>\n";
								echo "\t\t\t\t\t\t\t".'<span id="toggle_div_span_<?php echo $v[Inflector::singularize($this->name)][\'id\'];?>_spinner" title="Loadding..." class=\'icon icone-spinner green pointer\' style="display:none"></span>'."\n";
								echo "\t\t\t\t\t\t</td>\n";
							}else if($field == "id"){
								echo "\t\t\t\t\t\t".'<td><input type="checkbox" value="<?php echo $v[Inflector::singularize($this->name)]["id"];?>" class="icheckbox_minimal-grey"></td>'."\n";
							}else{
								echo "\t\t\t\t\t\t<td><?php echo h(\$v[Inflector::singularize(\$this->name)][\"{$field}\"]); ?>&nbsp;</td>\n";
							}
						}
					}
					echo "\t\t\t\t\t\t\t<td class=\"actions\">\n";
					echo "\t\t\t\t\t\t\t\t".'<div class="toolbar">'."\n";
					echo "\t\t\t\t\t\t\t\t\t".'<?php echo $this->Html->link("<span class=\"icone-pencil\"></span>",array("action"=>"edit",$v[Inflector::singularize($this->name)]["id"]),array("escape"=>false,"class"=>"btn btn-small"));?>'."\n";
					echo "\t\t\t\t\t\t\t\t\t".'<?php echo $this->Form->postLink("<span class=\"icone-trash\"></span>", array("action" => "delete", $v[Inflector::singularize($this->name)]["id"]), array("escape"=>false,"class"=>"btn btn-small btn-danger"), __("confirmDel", $v[Inflector::singularize($this->name)]["id"])); ?>'."\n";
					echo "\t\t\t\t\t\t\t\t</div>\n";

					echo "\t\t\t\t\t\t\t</td>\n";
					echo "\t\t\t\t\t\t</tr>\n";
					echo "\t\t\t\t\t\t<?php endforeach; ?>\n";
					?>
					</tbody>
				</table>
			<div>
			<?php echo '<?php echo $this->element("libs/pagination");?>'."\n"; ?>
        </section>
    </div>
    <!--/ END Datatable  -->
</div>
<!--/ END Row -->



