<!-- <div class="page-header line1">
    <h4>Quản lý nội dung</h4>
</div> -->
<!-- START Row --><?php echo $this->Form->create('frm',array('type' => 'post'));?>
<div class="row-fluid">
    <!-- START Datatable 2 -->
    <div class="span12 widget dark">
    	
        <header>
           	<h4 class="title pull-left"><span class="icon icone-list"></span></h4>
            <!-- START Button Group -->
            <div class="btn-group pull-left">
            	<?php echo $this->Html->link("<span class=\"icone-trash\"></span>&nbsp;&nbsp;Xóa các mục đã chọn",array("action"=>"#"),array("class"=>"btn btn-danger","id"=>"chkAll","escape"=>false));?>
            </div>

            <div class="btn-group pull-right">
                <?php echo $this->Html->link("<span class=\"icone-edit\"></span>&nbsp;&nbsp;Thêm mới",array("action"=>"add"),array("class"=>"btn btn-success","escape"=>false));?>
            </div>
            <!--/ END Button Group -->
        </header>
        <section class="body">
            <div class="body-inner no-padding">
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead class="sorting">
                        <tr>
                            <th width="5%"><input type="checkbox"></th>
                            <th><?php echo $this->Paginator->sort('name','Tên nhóm'); ?></th>
                            <th><?php echo $this->Paginator->sort('intro','Ghi chú'); ?></th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($groups as $k => $v) :?>
						<tr>
						<td><input type='checkbox' value="<?php echo $v[Inflector::singularize($this->name)]['id'];?>" class='icheckbox_minimal-grey'></td>
						<td><?php echo $v[Inflector::singularize($this->name)]['name'];?></td>
						<td><?php echo $v[Inflector::singularize($this->name)]['intro'];?></td>
						<td><div class='toolbar'>
							<?php echo $this->Html->link("<span class='icone-pencil'></span>",array("action"=>"edit",$v[Inflector::singularize($this->name)]['id']),array("escape"=>false,"class"=>"btn btn-small"));?>
							<?php echo $this->Form->postLink("<span class='icone-trash'></span>", array('action' => 'delete', $v[Inflector::singularize($this->name)]['id']), array("escape"=>false,"class"=>"btn btn-small btn-danger"), __('confirmDel', $v[Inflector::singularize($this->name)]['id'])); ?>
						</div></td>
						</tr>
						<?php endforeach;?>

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


