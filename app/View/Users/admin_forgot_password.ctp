<div class="row-fluid">
    <?php echo $this->Form->create("User",array("class"=>"span12 widget stacked dark form-horizontal bordered"));?>
        <header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner">
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
