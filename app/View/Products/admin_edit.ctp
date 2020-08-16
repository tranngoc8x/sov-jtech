<div class="row-fluid">
<?php echo $this->Form->create("Product",array("class"=>"span12 widget stacked dark form-horizontal bordered","type"=>"file"));?>
	<header><h4 class="title">Cập nhật thông tin sản phẩm</h4></header>
    <section class="body">
        <div class="body-inner">
			<div class="control-group">
                <label class="control-label"><?php echo __("Tên (tiếng việt)");?></label>
                <div class="controls">
                    <?php
                        echo $this->Form->hidden('id');
						echo $this->Form->input("title", array(
							"div" => array(
								"title" => "Tên sản phẩm"
						),
                            "label" => false,
                            "class" => "span8"
						));
                    ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo __("Tên (tiếng anh)");?></label>
                <div class="controls">
                    <?php
						echo $this->Form->input("title_en", array(
							"div" => array(
								"title" => "Tên sản phẩm"
						),
                            "label" => false,
                            "class" => "span8"
						));
                    ?>
                </div>
            </div>
<!--			<div class="control-group">-->
<!--                <label class="control-label">--><?php //echo __("Nhà sản xuất");?><!--</label>-->
<!--                <div class="controls">-->
<!--                    --><?php
//						echo $this->Form->input("manufacturer", array(
//							"div" => array(
//								"title" => "Nhà sản xuất"
//						),
//                            "label" => false,
//                            "class" => "span8"
//						));
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--             <div class="control-group">-->
<!--                <label class="control-label">Giá sản phẩm</label>-->
<!--                <div class="controls">-->
<!--                    --><?php
//                        echo $this->Form->input("price", array(
//                            "div" => array(
//                                "class" => "span12",
//                                "title" => "Giá sản phẩm"
//                            ),
//                            "label" => false
//                        ));
//                    ?>
<!--                </div>-->
<!--            </div>-->

            <?php if(is_file('files/uploads/products/'.$this->request->data['Product']['imagesmall'])){?>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <div style='margin-bottom: 5px'>
                            <?php echo $this->Html->image('../files/uploads/products/'.$this->request->data['Product']['imagesmall'],array('width'=>200));?>
                        </div>
                    <?php echo $this->Form->checkbox('remove');?>Xóa ảnh này
                    </div>
                </div>
                <?php }?>
                <div class="control-group">
                    <label class="control-label">Ảnh sản phẩm</label>
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
<!--			<div class="control-group">-->
<!--                <label class="control-label">Mô tả </label>-->
<!--                <div class="controls">-->
<!--                    --><?php
//						echo $this->Form->input("description", array(
//							"div" => array(
//								"class" => "span12",
//								"title" => "Mô tả"
//							),
//							"label" => false,
//                            'type' =>'textarea',
//                            "class" => "span12"
//						));
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--            <div class="control-group">-->
<!--                <label class="control-label">Mô tả (tiếng anh)</label>-->
<!--                <div class="controls">-->
<!--                    --><?php
//						echo $this->Form->input("description_en", array(
//							"div" => array(
//								"class" => "span12",
//								"title" => "Mô tả"
//							),
//							"label" => false,
//                            'type' =>'textarea',
//                            "class" => "span12"
//						));
//                    ?>
<!--                </div>-->
<!--            </div>-->
            <div class="control-group">
                <label class="control-label">Thông tin sản phẩm</label>
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
                <label class="control-label">Thông tin sản phẩm(tiếng anh)</label>
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
<!--             <div class="control-group">-->
<!--                <label class="control-label">Thành phần</label>-->
<!--                <div class="controls">-->
<!--                    --><?php
//                        echo $this->Form->input("thanhphan", array(
//                            "div" => array(
//                                "class" => "span12",
//                                "title" => "Thành phần"
//                            ),
//                            "label" => false,
//                            "class" => "ckeditor"
//                        ));
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--            <div class="control-group">-->
<!--                <label class="control-label">Đối tượng sử dụng</label>-->
<!--                <div class="controls">-->
<!--                    --><?php
//                        echo $this->Form->input("doituong", array(
//                            "div" => array(
//                                "class" => "span12",
//                                "title" => "Đối tượng sử dụng"
//                            ),
//                            "label" => false,
//                            "class" => "ckeditor"
//                        ));
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--            <div class="control-group">-->
<!--                <label class="control-label">Cách dùng</label>-->
<!--                <div class="controls">-->
<!--                    --><?php
//                        echo $this->Form->input("cachdung", array(
//                            "div" => array(
//                                "class" => "span12",
//                                "title" => "Cách dùng"
//                            ),
//                            "label" => false,
//                            "class" => "ckeditor"
//                        ));
//                    ?>
<!--                </div>-->
<!--            </div>-->
<!--            <div class="control-group">-->
<!--                <label class="control-label">Thông tin bệnh học</label>-->
<!--                <div class="controls">-->
<!--                    --><?php
//                        echo $this->Form->input("info", array(
//                            "div" => array(
//                                "class" => "span12",
//                                "title" => "Thông tin bệnh học"
//                            ),
//                            "label" => false,
//                            "class" => "ckeditor"
//                        ));
//                    ?>
<!--                </div>-->
<!--            </div>-->

			<div class="control-group">
                    <label class="control-label">Loại sản phẩm</label>
                    <div class="controls">
                        <?php
							echo $this->Form->input("catalogs_id", array(
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
                        echo $this->element("libs/statusedit");
                    ?>
                </div>
            </div>
<!--            <div class="control-group">-->
<!--                <label class="control-label">Cho khách hàng xem giá</label>-->
<!--                <div class="controls">-->
<!--                    --><?php
//                        echo $this->Form->input("showprice", array(
//                            "div" => array(
//                                "class" => "span12",
//                                "title" => "Xem giá"
//                            ),
//                            "label" => false,
//                            "checked" => true
//                        ));
//                    ?>
<!--                </div>-->
<!--            </div>-->
            <div class="control-group">
                <label class="control-label">Sản phẩm nổi bật</label>
                <div class="controls">
                    <?php
                        echo $this->Form->input("hot", array(
                            "div" => array(
                                "class" => "span12",
                                "title" => "Sản phẩm bán chạy"
                            ),
                            "label" => false
                        ));
                    ?>
                </div>
            </div><div class="control-group">
                <label class="control-label">Sản phẩm mới</label>
                <div class="controls">
                    <?php
                        echo $this->Form->input("newsp", array(
                            "div" => array(
                                "class" => "span12",
                                "title" => "Sản phẩm mới"
                            ),
                            "label" => false
                        ));
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
