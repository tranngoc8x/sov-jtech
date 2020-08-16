<div class="row-fluid">
<?php echo $this->Form->create("Catalog",array("class"=>"span12 widget stacked dark form-horizontal bordered","type"=>"file"));?>
    <header><h4 class="title">Sửa thông tin danh mục sản phẩm</h4></header>
    <section class="body">
        <div class="body-inner">
            <div class="control-group">
                <label class="control-label"><?php echo __("Tên (tiếng việt)");?></label>
                <div class="controls">
                    <?php
                        echo $this->Form->input("name", array(
                            "div" => array(
                                "title" => "Tên nhóm"
                        ),
                            "label" => false,
                            "class" => "span8"
                        ));
                        echo $this->Form->hidden('id');
                    ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo __("Tên (tiếng anh)");?></label>
                <div class="controls">
                    <?php
                        echo $this->Form->input("name_en", array(
                            "div" => array(
                                "title" => "Tên nhóm"
                        ),
                            "label" => false,
                            "class" => "span8"
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
                     <?php //print_r($this->data); ?>
                </div>
            </div>
        </section>

   <?php echo $this->Form->end();?>
</div>