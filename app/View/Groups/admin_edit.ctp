<div class="row-fluid">
    <?php echo $this->Form->create("Group",array("class"=>"span12 widget stacked dark form-horizontal bordered","type"=>"file"));?>
        <header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner">
                <div class="control-group">
                    <label class="control-label"><?php echo __("Tên nhóm");?></label>
                    <div class="controls">
                        <?php
                        echo $this->Form->hidden("id");
                            echo $this->Form->input("name", array(
                                "div" => array(
                                    "title" => "Tên nhóm"
                                ),
                                "class" => "span12",
                                "label" => false
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Thông tin");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("intro", array(
                                "div" => array(
                                    "title" => "Thông tin"
                                ),
                                "class" => "span12",
                                "label" => false
                            ));
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
