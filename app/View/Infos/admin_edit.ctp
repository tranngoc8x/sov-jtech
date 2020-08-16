<div class="row-fluid">
	<?php echo $this->Form->create("Info",array("class"=>"span12 widget stacked dark form-horizontal bordered",'type'=>'file'));?>
        <header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner">
                <div class="control-group">
                    <label class="control-label"><?php echo __("title");?></label>
                    <div class="controls">
                        <?php
                        	echo $this->Form->hidden('id');
							echo $this->Form->input("name", array(
								"div" => array(
									"title" => "Tiêu đề"
								),
								"label" => false
							));
                        ?>
                    </div>
                </div>

                <!-- <div class="control-group">
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
                </div> -->
                <div class="control-group">
                    <label class="control-label">Giá trị</label>
                    <div class="controls">
                        <?php
                        echo $this->Form->input("content", array(
                            "div" => array(
                                "title" => "Tiêu đề"
                            ),
                            "label" => false
                        ));
                        ?>
                    </div>
                </div>
             <!--    <div class="control-group">
                    <label class="control-label">Value</label>
                    <div class="controls">
                        <?php
                        echo $this->Form->input("content_en", array(
                            "div" => array(
                                "title" => "Tiêu đề"
                            ),
                            "label" => false
                        ));
                        ?>
                    </div>
                </div> -->
                
                <div class="control-group">
                    <label class="control-label">Mô tả</label>
                    <div class="controls">
                        <?php
                        echo $this->Form->input("desc", array(
                            "div" => array(
                                "class" => "span12",
                                "title" => "Mô tả"
                            ),
                            "label" => false,
                        ));
                        ?>
                    </div>
                </div>
                <!-- <div class="control-group">
                    <label class="control-label">Description</label>
                    <div class="controls">
                        <?php
                        echo $this->Form->input("desc_en", array(
                            "div" => array(
                                "class" => "span12",
                                "title" => "Mô tả"
                            ),
                            "label" => false,
                        ));
                        ?>
                    </div>
                </div> -->
                <div class="control-group">
                    <label class="control-label">Hiển thị tiêu đề</label>
                    <div class="controls">
                        <?php
                        echo $this->Form->input("showname", array(
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
                    <label class="control-label">Thứ tự</label>
                    <div class="controls">
                        <?php
                        echo $this->Form->input("thutu", array(
                            "div" => array(
                                "class" => "span12",
                                "title" => "Mô tả"
                            ),
                            "label" => false,
                        ));
                        ?>
                    </div>
                </div>
                <!-- <div class="control-group">
                    <label class="control-label">Trạng thái hiển thị</label>
                    <div class="controls">
                        <?php
                        echo $this->Form->input("showicon", array(
                            "div" => array(
                                "class" => "span12",
                                "title" => "Mô tả"
                            ),
                            "label" => false,
                        ));
                        ?>
                    </div>
                </div> -->
               <!--  <div class="control-group">
                    <label class="control-label">Loại thông tin</label>
                    <div class="controls">
                        <?php
                        //echo $this->Form->select("type",array(
                            //    1=>"Doanh thu",
                            //    2=>"Giá trị vốn hóa",
                            //    3=>"Quy mô nhân sự",
                            //    4=>"Hiện diện",
                            //    5=>"Lĩnh vực kinh doanh cốt lõi",
                          //  ), array(
                          //  'empty'=>false,
                         //   "div" => array(
                        //        "class" => "span12",
                         //       "title" => "Mô tả"
                        //    ),
                       //     "label" => false,
                      //  ));
                        ?>
                    </div>
                </div> -->
         <!--    <?php if(is_file('files/uploads/info/'.@$this->request->data['Info']['image'])){?>
                                <div class="control-group">
                                    <label class="control-label"></label>
                                    <div class="controls">
                                        <div style='margin-bottom: 5px'>
                                            <?php echo $this->Html->image('/files/uploads/info/'.$this->request->data['Info']['image'],array('height'=>100,'style'=>'height: 100px;'));?>
                                        </div>
                                    </div>
                                </div>
                            <?php }?> -->
        <!--     <div class="control-group">
                <label class="control-label">Ảnh (80px + 80px)</label>
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
            </div> -->

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

