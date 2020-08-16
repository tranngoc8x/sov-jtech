<div class="row-fluid">
    <?php
        //debug($this->request->data);
    ?>
    <?php echo $this->Form->create("Content",array("class"=>"span12 widget stacked dark form-horizontal bordered"));?>
        <header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner">
                <div class="control-group">
                    <label class="control-label"><?php echo __("Tiêu đề  ");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("name", array(
                                "div" => array(
                                    "title" => "Tiêu đề"
                                ),
                                "label" => false,
                                "class" => "span12"
                            ));
                             echo $this->Form->hidden('type',array('value'=>$type));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Tiêu đề tiếng anh ");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("name_en", array(
                                "div" => array(
                                    "title" => "Tiêu đề"
                                ),
                                "label" => false,
                                "class" => "span12"
                            ));
                             echo $this->Form->hidden('type',array('value'=>$type));
                        ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"><?php echo __("Nội dung");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("content", array(
                                "div" => array(
                                    "title" => "Nội dung"
                                ),
                                "label" => false,
                                "class" => "span12 ckeditor"
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Nội dung tiếng anh");?></label>
                    <div class="controls">
                        <?php
                        echo $this->Form->input("content_en", array(
                            "div" => array(
                                "title" => "Nội dung"
                            ),
                            "label" => false,
                            "class" => "span12 ckeditor"
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