<!-- <div class="page-header line1">
    <h4>Quản lý nội dung</h4>
</div> -->
<!-- START Row -->
<?php echo $this->Form->create('frm',array('type' => 'post'));?>
<div class="row-fluid">
    <!-- START Datatable 2 -->
    <div class="span12 widget dark">
        <header>
            <h4 class="title pull-left"><span class="icon icone-list"></span></h4>
            <!-- START Button Group -->
            <div class="btn-group pull-left">
                <?php echo $this->Html->link("<span class=\"icone-trash\"></span>&nbsp;&nbsp;Xóa các mục đã chọn",'javascript:void(0);',array("class"=>"btn btn-danger","id"=>"chkAll","escape"=>false));?>
            </div>
<div class="pull-right">
    <?php 

// echo $this->Html->link('export', array(
//     'controller' => 'contacts', 
//     'action' => 'export',
//    // 'ext' => 'csv'
// ));
     ?>
</div>

            <!--/ END Button Group -->
        </header>
        <section class="body">
            <div class="body-inner no-padding">
                <div class="row-fluid headbar">
                    <div class="span12 filter pull-right">
                        <div class="dataTables_filter">
                            <label>
                                <div style="margin-top: 1px; display:inline-table;">
                                    <?php echo $this->element("libs/_ajax_status_index");?>
                                </div>
                                <?php echo $this->Form->input('s',array("label"=>false,"div"=>false));?>
                                <?php echo $this->Form->submit("&nbsp;Tìm kiếm",array("class"=>"btn icone-search btn-smalluccess","div"=>false,"escape"=>false));?>
                            </label>
                        </div>
                    </div>
            </div>
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead class="sorting">
                        <tr>
                            <th width="30"><input type="checkbox"></th>
                            <th><?php echo $this->Paginator->sort('name','Tên học sinh'); ?></th>
                            <th><?php echo $this->Paginator->sort('parents','Tên phụ huynh'); ?></th>
                             <th width="180"><?php echo $this->Paginator->sort('phone',"Số điện thoại"); ?></th>
                             <th width="180"><?php echo $this->Paginator->sort('email',"Email"); ?></th>
                            <!-- <th width="75"><?php echo $this->Paginator->sort('status',"Trạng thái"); ?></th> -->
                            <th width="75">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php foreach ($contacts as $v): ?>
						<tr>
							<td><input type='checkbox' value="<?php echo $v[Inflector::singularize($this->name)]['id'];?>" class='icheckbox_minimal-grey'></td>
							<td><?php echo h($v['Contact']['name']); ?>&nbsp;</td>
                            <td><?php echo h($v['Contact']['parents']); ?>&nbsp;</td>
                            <td><?php echo h($v['Contact']['phone']); ?>&nbsp;</td>
 							<td><?php echo h($v['Contact']['email']); ?>&nbsp;</td>
							<!-- <td class="center">
                            <div id="togglediv_<?php echo $v[Inflector::singularize($this->name)]['id'].'_'.$v[Inflector::singularize($this->name)]['status'].'_'.$this->request->params['controller'];?>" class="toggle_div">
                                <?php if($v[Inflector::singularize($this->name)]['status'] == 1){?>
                                <span data-content="2" id="toggle_div_span_<?php echo $v[Inflector::singularize($this->name)]['id'];?>" title="Ẩn" class='icon icone-remove red pointer'></span>
                                <?php }else{?>
                                <span data-content="1" id="toggle_div_span_<?php echo $v[Inflector::singularize($this->name)]['id'];?>"  title="Hiển thị" class='icon icone-ok green pointer'></span>
                                <?php }?>
                            </div>
                            <span id="toggle_div_span_<?php echo $v[Inflector::singularize($this->name)]['id'];?>_spinner" title="Loadding..." class='icon icone-spinner green pointer' style="display:none"></span>
                            <?php //echo $app->toggle(1,2);?>
                        </td> -->
						<td><div class='toolbar'>
							<?php echo $this->Html->link("<span class='icone-pencil'></span>",array("action"=>"view",$v[Inflector::singularize($this->name)]['id']),array("escape"=>false,"class"=>"btn btn-small"));?>
							<?php echo $this->Form->postLink("<span class='icone-trash'></span>", array('action' => 'delete', $v[Inflector::singularize($this->name)]['id']), array("escape"=>false,"class"=>"btn btn-small btn-danger"), __('confirmDel', $v[Inflector::singularize($this->name)]['id'])); ?>
						</div></td>
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
<?php echo $this->Form->end();?>


