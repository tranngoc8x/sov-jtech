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
                            <th width="5%"><div align="center"><input type="checkbox"></div></th>
                            <th><?php echo $this->Paginator->sort('name','Họ tên'); ?></th>
                            <th width="20%"><?php echo $this->Paginator->sort('username','Tài khoản'); ?></th>
                            <th><?php echo $this->Paginator->sort('Groups.name','Nhóm người dùng'); ?></th>
                            <th width="10%" align="center"><?php echo $this->Paginator->sort('status',"Trạng thái"); ?></th>
                            <th width="10%" align="center"><div align="center">Thao tác</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($users as $k => $v) :?>
						<tr>
						<td><div align="center"><input type='checkbox' value="<?php echo $v[Inflector::singularize($this->name)]['id'];?>" class='icheckbox_minimal-grey'></div></td>
						<td><?php echo $v[Inflector::singularize($this->name)]['name'];?></td>
						<td><?php echo $v[Inflector::singularize($this->name)]['username'];?></td>
						<td><?php echo $v['Groups']['name'];?></td>
						<td>
          
                            <?php //$app->toggle(1,2); ?>

                        </td>
						<td><div class='toolbar' align="center">
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