<div class="row-fluid">
    <?php echo $this->Form->create("User",array("class"=>"span12 widget stacked dark form-horizontal bordered"));?>
        <header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner">
                <div class="control-group">
                    <label class="control-label"><?php echo __("Họ tên");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("name", array(
                                "div" => array(
                                    "title" => "Họ tên"
                                ),
                                "label" => false
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Tên đăng nhập");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("username", array(
                                "div" => array(
                                    "title" => "Tên đăng nhập"
                                ),
                                "label" => false
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Mật khẩu");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("password", array(
                                "div" => array(
                                    "title" => "Mật khẩu"
                                ),
                                "label" => false
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Gõ lại mật khẩu");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("password_confirm", array(
                                "div" => array(
                                    "title" => "Nhắc ;ại mật khẩu"
                                ),
                                "label" => false,
                                "type" => "password"
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("email", array(
                                "div" => array(
                                    "title" => "Email"
                                ),
                                "label" => false
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nhóm người dùng</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("groups_id", array(
                                "div" => array(
                                    "class" => "span12",
                                ),
                                "label" => false,
                                "class" => "select2"
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
                <div class="control-group">
                    <label class="control-label">Ảnh đại diện</label>
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
