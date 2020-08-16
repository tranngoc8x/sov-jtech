<div class="row-fluid">
<?php echo $this->Form->create("Event",array("class"=>"span12 widget stacked dark form-horizontal bordered","type"=>"file"));?>
	<header><h4 class="title">Thêm mới sự kiện</h4></header>
    <section class="body">
        <div class="body-inner">
			<div class="control-group">
                <label class="control-label"><?php echo __("Tiêu đề sự kiện");?></label>
                <div class="controls">
                    <?php
						echo $this->Form->input("name", array(
							"div" => array(
								"title" => "Tiêu đề sự kiện"
						),
                            "label" => false,
                            "class" => "span8"
						));
                    ?>
                </div>
            </div>

              <div class="control-group">
                    <label class="control-label">Ảnh sự kiện</label>
                    <div class="controls">
                         <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                                <div class="uneditable-input span3">
                                    <i class="icon-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                </div>
                                <span class="btn btn-file"><span class="fileupload-new">Chọn ảnh</span>
                                <span class="fileupload-exists">Đổi</span>
                                    <?php
                                        echo $this->Form->input("image",array("type"=>"file","label"=>false,"div"=>false));
                                    ?>
                                </span>
                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Xóa</a>
                            </div>
                        </div>

                    </div>
                </div>
			<div class="control-group">
                <label class="control-label">Tóm tắt sự kiện</label>
                <div class="controls">
                    <?php
						echo $this->Form->input("introtext", array(
							"div" => array(
								"class" => "span12",
								"title" => "Mô tả"
							),
							"label" => false,
                            'type' =>'textarea',
                            "class" => "span12"
						));
                    ?>
                </div>
            </div>

             <div class="control-group">
                <label class="control-label">Nội dung </label>
                <div class="controls">
                    <?php
                        echo $this->Form->input("content", array(
                            "div" => array(
                                "class" => "span12",
                                "title" => "Nội dung"
                            ),
                            "label" => false,
                            "class" => "ckeditor"
                        ));
                    ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo __("Thời gian bắt đầu");?></label>
                <div class="controls">
                    <?php
                    echo $this->Form->input("start_date", array(
                        "div" => false,
                        "label" => false,
                        'class' =>"datepicker",
                        'style'=>'height: 28px',
                        'type'=>'text',
                        "value"=>$this->request->data['Event']['start_date'],
                        'placeholder'=>'Ngày',
                    )); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo __("Thời gian kết thúc");?></label>
                <div class="controls">
                    <?php
                    echo $this->Form->input("end_date", array(
                        "div" => false,
                        "label" => false,
                        'class' =>"datepicker",
                        'style'=>'height: 28px',
                        'type'=>'text',
                        "value"=>$this->request->data['Event']['end_date'],
                        'placeholder'=>'Ngày',
                    )); 
                    ?>

                </div>
            </div>


            <div class="control-group">
                <label class="control-label">Trạng thái</label>
                <div class="controls">
                    <?php
                        echo $this->element("libs/status");
                    ?>
                </div>
            </div>

            <div class="form-actions">
                    <?php
						echo $this->Form->button("Submit",array("type" => "submit","class"=>"btn btn-primary","div"=>false));
						echo "&nbsp;";
						echo $this->Form->button("Reset", array("type" => "reset","class"=>"btn","div"=>false));
                    ?>
                </div><!--/ Form Action -->
                <div class="control">
                 </div>
            </div>
        </section>

   <?php echo $this->Form->end();?>
   </div>
   <?php echo $this->Html->script('libs/moment') ?>
<link href="//taquangbuu-bk.edu.vn/libs/bootstrap-datetimepicker/css/bootstrap.min.css"  rel="stylesheet" />
<link href="//taquangbuu-bk.edu.vn/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"  rel="stylesheet" />
<script type="text/javascript" src="//taquangbuu-bk.edu.vn/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script>

    $(".datepicker").datetimepicker({
        "sideBySide": true,
        "format": "D/M/Y H:mm"
     });
</script>