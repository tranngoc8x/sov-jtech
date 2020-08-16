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
            <header><h4 class="title">Danh sách thông tin</h4></header>
             </div>
            <div class="btn-group pull-right">
                <?php echo $this->Html->link("<span class=\"icone-edit\"></span>&nbsp;&nbsp;Thêm mới",array("action"=>"add"),array("class"=>"btn btn-success","escape"=>false));?>
            </div>
            <!--/ END Button Group -->
        </header>
        <section class="body">
            <div class="body-inner no-padding">
                <div class="row-fluid headbar">
                    <div class="span12 filter pull-right">
                        <div class="dataTables_filter">
                            <?php echo $this->Form->create('frm',array('type' => 'post'));?>

                            <label>
                                <div style="margin-top: 1px; display:inline-table;">
                                    <?php echo $this->element("libs/_ajax_status_index");?>
                                </div>
                                <?php echo $this->Form->input('s',array("label"=>false,"div"=>false));?>
                                <?php echo $this->Form->submit("&nbsp;Tìm kiếm",array("class"=>"btn icone-search btn-smalluccess","div"=>false,"escape"=>false));?>
                            </label>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hover datatable">
                    <thead class="sorting">
                        <tr>
                            <th width="5%" align="center"><div align="center"><input type="checkbox"></div></th>
                             <th>Tên thông tin</th>
                            <th width="75"><div style="text-align:center !important">Thao tác</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($infos as $k => $v) :?>
                        <tr>
                        <td align="center"><div align="center"><input type='checkbox' value="<?php echo $v[Inflector::singularize($this->name)]['id'];?>" class='icheckbox_minimal-grey'></div></td>
                        <td><?php echo __($v[Inflector::singularize($this->name)]['name']);?></td>
<!--                        <td>--><?php //echo __($v['Catenews']['name']);?><!--</td>-->
                         
                        <td align="center"><div class='toolbar' align="center">
                            <?php echo $this->Html->link("<span class='icone-pencil'></span>",array("action"=>"edit",$v[Inflector::singularize($this->name)]['id']),array("escape"=>false,"class"=>"btn btn-small"));?>
                            <?php echo $this->Form->postLink("<span class='icone-trash'></span>", array('action' => 'delete', $catenews_id,$v[Inflector::singularize($this->name)]['id']), array("escape"=>false,"class"=>"btn btn-small btn-danger"), __('Bạn có muốn xóa bản ghi này không ?', $v[Inflector::singularize($this->name)]['id'])); ?>
                        </div></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <?php //echo $this->element("libs/pagination");?>
            <?php //echo $this->element("sql_dump");?>
        </section>
    </div>
    <!--/ END Datatable  -->
</div>
<!--/ END Row -->

