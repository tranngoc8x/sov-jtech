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
            <header><h4 class="title">Danh sách chuyên mục tin tức</h4></header>
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
                             <th>Tên menu</th>
                            <th width="60"><div style="text-align:center !important">Trạng thái</div></th>
                            <th width="40"><div style="text-align:center !important">Thứ tự</div></th>
                            <th width="75"><div style="text-align:center !important">Thao tác</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($linksTree as $k => $v) :?>
                        <tr>
                         <td><?php echo $v;?></td>
                        <td class="center">
                            <div id="togglediv_<?php echo $k.'_'.$linksStatus[$k].'_'.$this->request->params['controller'];?>" class="toggle_div">
                                <?php if($linksStatus[$k] == 1){?>
                                <span data-content="2" id="toggle_div_span_<?php echo $k;?>" title="Ẩn" class='icon icone-remove red pointer'></span>
                                <?php }else{?>
                                <span data-content="1" id="toggle_div_span_<?php echo $k;?>"  title="Hiển thị" class='icon icone-ok green pointer'></span>
                                <?php }?>
                            </div>
                            <span id="toggle_div_span_<?php echo $k;?>_spinner" title="Loadding..." class='icon icone-spinner green pointer' style="display:none"></span>
                        </td>
                        <td>
                        <div style="text-align:center !important">
                            <?php
                                //echo $v[Inflector::singularize($this->name)]['url'];
                                echo $this->Html->link("<span title=\"Lên\" class='icon icon-chevron-up'></span>",array('action'=>'moveup',$k),array('escape'=>false));
                                echo "&nbsp;&nbsp;";
                                echo $this->Html->link("<span title=\"Xuống\" class='icon icon-chevron-down'></span>",array('action'=>'movedown',$k),array('escape'=>false));
                            ?>
                        </td>
                        <td>
                        <div style="text-align:center !important">
                        <div class='toolbar'>
                            <?php echo $this->Html->link("<span class='icone-pencil'></span>",array("action"=>"edit",$k),array("escape"=>false,"class"=>"btn btn-small"));?>
                            <?php echo $this->Form->postLink("<span class='icone-trash'></span>", array('action' => 'delete', $k), array("escape"=>false,"class"=>"btn btn-small btn-danger"), __('confirmDel', $k)); ?>
                        </div>
                        </div>
                        </td>
                        </td>
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
<?php echo $this->Form->end();?>

