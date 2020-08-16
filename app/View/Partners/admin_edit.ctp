<div class="row-fluid">
    <?php
        //debug($this->request->data);
    ?>
    <?php echo $this->Form->create("Partner",array("class"=>"span12 widget stacked dark form-horizontal bordered","type"=>"file"));?>
        <header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner">
                <div class="control-group">
                    <label class="control-label"><?php echo __("Tên");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->hidden('id');
                            echo $this->Form->input("name", array(
                                "div" => array(
                                    "title" => "Tiêu đề"
                                ),
                                "label" => false,
                                "class" => "span12"
                            ));

                        ?>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label"><?php echo __("Đường link");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("link", array(
                                "div" => array(
                                    "title" => "Đường link"
                                ),
                                "label" => false,
                                "class" => "span12"
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nội dung</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("content", array(
                                "div" => array(
                                    "class" => "span12 ckeditor",
                                ),
                                "label" => false
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Thứ tự</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("order", array(
                                "div" => array(
                                    "class" => "span12",
                                ),
                                "label" => false
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

                <?php if(is_file('files/uploads/partners/'.@$this->request->data['Partner']['image'])){?>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <div style='margin-bottom: 5px'>
                            <?php echo $this->Html->image('/files/uploads/partners/'.$this->request->data['Partner']['image']);?>
                        </div>
                    <?php echo $this->Form->checkbox('remove');?>Xóa ảnh này
                    </div>
                </div>
                <?php }?>
                <div class="control-group">
                    <label class="control-label">Logo</label>
                    <div class="controls">
                         <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="input-append">
                                <div class="uneditable-input span3">
                                    <i class="icon-file fileupload-exists"></i>
                                    <span class="fileupload-preview"></span>
                                </div>
                                <span class="btn btn-file"><span class="fileupload-new">Chọn file</span>
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
                <!-- Form Action -->
                <div class="form-actions">
                    <?php
                        echo $this->Form->button("Submit",array("type" => "submit","class"=>"btn btn-primary","div"=>false));
                        echo "&nbsp;";
                        echo $this->Form->button("Reset", array("type" => "reset","class"=>"btn","div"=>false));
                    ?>
                </div><!--/ Form Action -->
            </div>
        </section>
   <?php echo $this->Form->end();?>
</div>

