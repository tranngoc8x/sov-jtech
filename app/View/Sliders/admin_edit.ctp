<div class="row-fluid">
    <?php echo $this->Form->create("Slider",array("class"=>"span12 widget stacked dark form-horizontal bordered",'type'=>"file"));?>
        <header><h4 class="title">Cập nhật thông tin slider</h4></header>
        <section class="body">
            <div class="body-inner">
        	<?php if(is_file('files/uploads/slider/'.@$this->request->data['Slider']['image'])){?>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <div style='margin-bottom: 5px'>
                            <?php echo $this->Html->image('/files/uploads/slider/'.$this->request->data['Slider']['image'],array('width'=>200));?>
                        </div>
                    <?php echo $this->Form->checkbox('remove');?>Xóa ảnh này
                    </div>
                </div>
                <?php }?>
            
                <div class="control-group">
                    <label class="control-label"><?php echo __("Hình ảnh");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("image", array(
                                "div" => array(
                                    "title" => "Ảnh"
                                ),
                                "label" => false,
                                'type'=>"file"
                            ));
                            echo $this->Form->hidden('id');
                        ?>
                    </div>
                </div>
                <?php if(is_file('files/uploads/slider/mobile/'.@$this->request->data['Slider']['image2'])){?>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <div style='margin-bottom: 5px'>
                            <?php echo $this->Html->image('/files/uploads/slider/mobile/'.$this->request->data['Slider']['image2'],array('width'=>200));?>
                        </div>
                    <?php echo $this->Form->checkbox('remove');?>Xóa ảnh này
                    </div>
                </div>
                <?php }?>
            
                <div class="control-group">
                    <label class="control-label"><?php echo __("Hình ảnh trên điện thoại");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("image2", array(
                                "div" => array(
                                    "title" => "Ảnh"
                                ),
                                "label" => false,
                                'type'=>"file"
                            ));
                        ?>
                    </div>
                </div>
				<div class="control-group">
                    <label class="control-label"><?php echo __("Mã bài viết");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("link", array(
                                "div" => array(
                                    "title" => "link"
                                ),
                                "label" => false,
                                "placeholder"=>"Mã bài viết ở trong danh sách bài viết"

                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Hiển thị full màn hình");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("hotnews", array(
                                "div" => array(
                                    "title" => "Hiển thị full màn hình"
                                ),
                                "label" => false,
                            ));
                        ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Thứ tự</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("thutu", array(
                                "div" => array(
                                    "class" => "span6",
                                    "title" => "Mô tả"
                                ),
                                "label" => false,
                                'class'=>'',
                                'placeholder'=>"1,2,3 ..."
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

