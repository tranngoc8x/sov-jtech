<!-- <div class="page-header line1">
    <h4>Quản lý nội dung</h4>
</div> -->
<!-- START Row -->
<style>
    .icheckbox_minimal-grey, .iradio_minimal-grey {
        display: inline-block;
        float: none;

        }
</style>
<?php echo  $this->Form->create('Image')?>
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
                <?php echo $this->Form->submit('Lưu lại',array('class'=>'btn btn-info','div'=>false,'style'=>'margin-right: 5px;')) ?>
                <?php echo $this->Html->link("<span class=\"icone-edit\"></span>&nbsp;&nbsp;Thêm mới",array("action"=>"addimage",$id),array("class"=>"btn btn-success","escape"=>false));?>
            </div>
            <!--/ END Button Group -->
        </header>
        <section class="body">
            <div class="body-inner no-padding">
                <table class="table table-bordered table-striped table-hover datatable">
                    <tbody>
                        <tr>
                        <?php foreach ($result as $k => $v) :?>

                        <td align='center' style='text-align:center'>
                            <input type='radio' name="actived" value="<?php echo $v['Image']['id'];?>" <?php if($v['Image']['actived'] == 1) echo 'checked'; ?> class='icheckbox_minimal-grey'>
                            <input type='radio' style="display:none;" name="oldactive" value="<?php echo $v['Image']['id'];?>" class='icheckbox_minimal-grey' <?php if($v['Image']['actived'] == 1) echo 'checked'; ?>>
                            <?php echo $this->Html->image('/files/uploads/galleries/'.$v['Gallery']['catpath'].'/'.$v['Image']['thumb'],array('width'=>150));?>
                        <br>
                        <?php echo $v['Image']['name'] ?>
                            <br><br>
                            <div style='text-align:center'>
                            <input type='checkbox' value="<?php echo $v['Image']['id'];?>" class='icheckbox_minimal-grey'>
                            <?php echo $this->Form->postLink("<span class='icone-trash'></span>", array('action' => 'delete', $v['Image']['id'],$v['Gallery']['id']), array("escape"=>false,"class"=>"btn btn-small btn-danger"), __('confirmDel', $v['Image']['id'])); ?>
                            </div>
                        </td>
                        <?php if (($k+1) % 5 == 0): ?>
                            </tr><tr>
                        <?php endif ?>
                        <?php endforeach;?>
                        </tr>
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
<?php echo $this->Form->end() ?>