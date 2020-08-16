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
                <?php echo $this->Html->link("<span class=\"icone-trash\"></span>&nbsp;&nbsp;Xóa các mục đã chọn",'javascript:void(0);',array("class"=>"btn btn-danger","id"=>"chkAll","escape"=>false));?>
            </div>
            <div class="btn-group pull-right">
                <?php echo $this->Html->link("<span class=\"icone-edit\"></span>&nbsp;&nbsp;Thêm mới",array("action"=>"add"),array("class"=>"btn btn-success","escape"=>false));?>
            </div>
            <!--/ END Button Group -->
        </header>
        <section class="body">
            <div class="body-inner no-padding">
                <div class="row-fluid headbar">
                    <?php echo $this->Form->create('frm',array('type' => 'post'));?>
                    <div class="span12 filter pull-right">
                        <div class="dataTables_filter">
                            <label>
                                <?php echo $this->Form->input('s',array("label"=>false,"div"=>false));?>
                                <div style="margin-top: 1px; display:inline-table;">
                                    <?php echo $this->Form->input('catalogs_id',array('label'=>false,'class'=>"select2","div"=>false,'empty'=>true));?>
                                    &nbsp;
                                    <?php echo $this->element("libs/_ajax_status_index");?>
                                </div>

                                <?php echo $this->Form->submit("&nbsp;Tìm kiếm",array("class"=>"btn icone-search btn-smalluccess","div"=>false,"escape"=>false));?>
                            </label>
                        </div>
                    </div>
                    <?php echo $this->Form->end();?>
            </div>
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead class="sorting">
						<tr>
							<th width="25"><input type="checkbox"></th>
							<th><?php echo $this->Paginator->sort('title','Tên sản phẩm'); ?></th>
							<th width="120"><?php echo $this->Paginator->sort('catalogs_id','Danh mục'); ?></th>
                            <th width="100" align="center"><?php echo $this->Paginator->sort('hot','Sản phẩm nổi bật'); ?></th>
 							<th width="75" align="center"><?php echo $this->Paginator->sort('status','Trạng thái'); ?></th>
							<th width="75" class="actions"><?php echo __('Tùy chọn'); ?></th>
						</tr>
					</thead>
                    <tbody>
						<?php foreach ($products as $k=>$v): ?>
						<tr>
							<td><input type='checkbox' value="<?php echo $v[Inflector::singularize($this->name)]['id'];?>" class='icheckbox_minimal-grey'></td>
							<td><?php echo __($v[Inflector::singularize($this->name)]['title']); ?> / <?php echo __($v[Inflector::singularize($this->name)]['title_en']); ?></td>

							<td>
								<?php echo $v['Catalog']['name']; ?>
							</td>
							<td class="center">
                                 <div id="toggledivf_<?php echo $v[Inflector::singularize($this->name)]['id'].'_'.$v[Inflector::singularize($this->name)]['hot'].'_'.$this->request->params['controller'];?>" class="toggle_divf">
                                <?php if($v[Inflector::singularize($this->name)]['hot'] == 0){?>
                                <span data-content="1_hot" id="toggle_div_spanf_<?php echo $v[Inflector::singularize($this->name)]['id'];?>" title="Ẩn" class='icon icone-remove red pointer'></span>
                                <?php }else{?>
                                <span data-content="0_hot" id="toggle_div_spanf_<?php echo $v[Inflector::singularize($this->name)]['id'];?>"  title="Hiển thị" class='icon icone-ok green pointer'></span>
                                <?php }?>
                            </div>
                            <span id="toggle_div_spanf_<?php echo $v[Inflector::singularize($this->name)]['id'];?>_spinner" title="Loadding..." class='icon icone-spinner green pointer' style="display:none"></span>
							</td>

                            <td class="center">
								<div id="togglediv_<?php echo $v[Inflector::singularize($this->name)]['id'].'_'.$v[Inflector::singularize($this->name)]['status'].'_'.$this->request->params['controller'];?>" class="toggle_div">
                                <?php if($v[Inflector::singularize($this->name)]['status'] == 1){?>
                                <span data-content="2" id="toggle_div_span_<?php echo $v[Inflector::singularize($this->name)]['id'];?>" title="Ẩn" class='icon icone-remove red pointer'></span>
                                <?php }else{?>
                                <span data-content="1" id="toggle_div_span_<?php echo $v[Inflector::singularize($this->name)]['id'];?>"  title="Hiển thị" class='icon icone-ok green pointer'></span>
                                <?php }?>
                            </div>
                            <span id="toggle_div_span_<?php echo $v[Inflector::singularize($this->name)]['id'];?>_spinner" title="Loadding..." class='icon icone-spinner green pointer' style="display:none"></span>
							</td>

							<td class="actions">
								<div class='toolbar'>
									<?php echo $this->Html->link("<span class='icone-pencil'></span>",array("action"=>"edit",$v[Inflector::singularize($this->name)]['id']),array("escape"=>false,"class"=>"btn btn-small"));?>
									<?php echo $this->Form->postLink("<span class='icone-trash'></span>", array('action' => 'delete', $v[Inflector::singularize($this->name)]['id']), array("escape"=>false,"class"=>"btn btn-small btn-danger"), __('confirmDel', $v[Inflector::singularize($this->name)]['id'])); ?>
 								</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			 </div>
            <?php echo $this->element("libs/pagination");?>
            <?php //echo $this->element("sql_dump");?>
        </section>

    </div>
    <!--/ END Datatable  -->
</div>
<!--/ END Row -->