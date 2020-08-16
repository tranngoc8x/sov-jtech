<div class="row-fluid">
    <?php echo $this->Form->create("News",array("class"=>"span12 widget stacked dark form-horizontal bordered","type"=>"file"));?>
        <header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner">
                <div class="control-group">
                    <label class="control-label">Tiêu đề</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->hidden('id');
                            echo $this->Form->hidden('oldid',array('value'=>$this->request->data['News']['catenews_id']));
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
                    <label class="control-label">Title</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("name_en", array(
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
                    <label class="control-label"><?php echo __("Tóm tắt");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("introtext", array(
                                "div" => array(
                                    "title" => "Tóm tắt"
                                ),
                                "label" => false,
                                "class" => "span12"
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
                                    "title" => "Tóm tắt"
                                ),
                                "label" => false,
                                "class" => "span12"
                            ));
                        ?>
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Nội dung đầy đủ</label>
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
                    <label class="control-label">Content</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("content_en", array(
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
                    <label class="control-label">Loại bài viết</label>
                    <div class="controls">
                        <?php echo $this->Form->input('catenews_id', array( 'label'=>false,'class'=>'select2')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Trạng thái</label>
                    <div class="controls">
                        <?php
                            echo $this->element("libs/statusedit");
                        ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"><?php echo __("Tác giả/ Nguồn tin");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("author", array(
                                "div" => array(
                                    "title" => "Tác giả/ Nguồn tin"
                                ),
                                "label" => false,
                                "class" => "span5"
                            ));
                        ?>
                    </div>
                </div>
               <div class="control-group">
                    <label class="control-label"><?php echo __("Thời gian xuất bản");?></label>
                    <div class="controls">
                        <?php
                        echo $this->Form->input("publishseddate", array(
                            "div" => false,
                            "label" => false,
                            "class" => "",
                             "id"=>"datepicker",
                            'type'=>'text',
                            'value'=>$this->request->data['News']['publishseddate'],
                             'placeholder'=>'Ngày',
                        ));
                        echo $this->Form->input("publishsedtime", array(
                            "div" => false,
                            "label" => false,
                            "class" => "",
                             "id"=>"timepicker1",
                            'type'=>'text',
                             'placeholder'=>'Ngày',
                        ));

                        ?>
                        <script>$('#timepicker1').wickedpicker({title: "",now: "<?php echo $this->request->data['News']['publishsedtime']?>"});</script>
                                                
                </div>
                <?php if(is_file('files/uploads/news/'.@$this->request->data['News']['image'])){?>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <div style='margin-bottom: 5px'>
                            <?php echo $this->Html->image('/files/uploads/news/'.$this->request->data['News']['image'],array('width'=>140));?>
                        </div>
                    <?php echo $this->Form->checkbox('remove');?>Xóa ảnh này
                    </div>
                </div>
                <?php }?>
                <div class="control-group">
                    <label class="control-label">Ảnh minh họa</label>
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
                    <label class="control-label"><?php echo __("Mô tả ảnh");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("imagedesc", array(
                                "div" => array(
                                    "title" => "Mô tả ảnh"
                                ),
                                "label" => false,
                                "class" => "span12"
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Image Description</label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("imagedesc_en", array(
                                "div" => array(
                                    "title" => "Mô tả ảnh"
                                ),
                                "label" => false,
                                "class" => "span12"
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Hiển thị ảnh minh họa trong chi tiết bài viết");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("showimage", array(
                                "div" => array(
                                    "title" => "Hiển thị ảnh minh họa trong bài viết"
                                ),
                                "label" => false,
                            ));
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Tin nổi bật");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("hotnews", array(
                                "div" => array(
                                    "title" => "Tin nổi bật"
                                ),
                                "label" => false,
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

