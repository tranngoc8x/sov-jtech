<div class="row-fluid">
    <?php echo $this->Form->create("Catenews",array("class"=>"span12 widget stacked dark form-horizontal bordered"));?>
        <header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner">
                <div class="control-group">
                    <label class="control-label"><?php echo __("title");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("name", array(
                                "div" => array(
                                    "title" => "Tiêu đề"
                                ),
                                "label" => false
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Title</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("name_en", array(
                                "div" => array(
                                    "title" => "Tiêu đề"
                                ),
                                "label" => false
                            ));
                        ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Mô tả</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("introtext", array(
                                "div" => array(
                                    "class" => "span12",
                                    "title" => "Mô tả"
                                ),
                                "label" => false,
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Description</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("introtext_en", array(
                                "div" => array(
                                    "class" => "span12",
                                    "title" => "Mô tả"
                                ),
                                "label" => false,
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Menu cha</label>
                    <div class="controls">
                        <?php
                        echo $this->Form->select("parent_id", $parent,array(
                                "div" => array(
                                    "class" => "span12",
                                ),
                                "label" => false,
                                "class" => "select2",
                                "empty" => "Chọn 1 mục"
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

