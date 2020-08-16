<?php
/**
 * @author			Trần Ngọc Thắng
 * @link			https://facebook.com/tranngoc8x
 * @version			Cake 2.4
 */
?>
<div class="row-fluid">
	<?php echo $this->Form->create('About',array("class"=>"span12 widget stacked dark form-horizontal bordered",'type'=>'file')); ?>
	<header><h4 class="title">Cập nhật bài viết</h4></header>
        <section class="body">
            <div class="body-inner">
				<div class="control-group">
					<label class="control-label"><?php echo __("Tên");?></label>
					<div class="controls">
						<?php
						echo $this->Form->hidden('id');
							echo $this->Form->input('name', array(
								"div" => array(
									"title" => "name"
								),
								"label" => false,
								"class" => "span12"
							))
						?>
					</div>
				</div>
                <div class="control-group">
                    <label class="control-label"><?php echo __("Mô tả");?></label>
                    <div class="controls">
                        <?php
                        echo $this->Form->input('desc', array(
                            "div" => array(
                                "title" => "desc"
                            ),
                            "label" => false,
                            "class" => "span12 ckeditor"
                        ))
                        ?>
                    </div>
                </div>
				<div class="control-group">
					<label class="control-label"><?php echo __("Nội dung");?></label>
					<div class="controls">
						<?php
							echo $this->Form->input('content', array(
								"div" => array(
									"title" => "content"
								),
								"label" => false,
								"class" => "span12 ckeditor"
							))
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
			</div>
            <div class="control-group">
                <label class="control-label"><?php echo __("Màu nền");?></label>
                <div class="controls">
                    <?php
                    echo $this->Form->input('background', array(
                        "div" => array(
                            "title" => "background"
                        ),
                        "label" => false,
                        "class" => "span4",
                        'placeholder'=>'#ffffff'
                    ))
                    ?>
                </div>
            </div>
            <?php if(is_file('files/uploads/abouts/'.@$this->request->data['About']['image'])){?>
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <div style='margin-bottom: 5px'>
                            <?php echo $this->Html->image('/files/uploads/abouts/'.$this->request->data['About']['image'],array('width'=>140));?>
                        </div>
                        <?php echo $this->Form->checkbox('remove');?>Xóa ảnh này
                    </div>
                </div>
            <?php }?>
            <div class="control-group">
                <label class="control-label">Ảnh nền</label>
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
                <label class="control-label"><?php echo __("Loại ảnh");?></label>
                <div class="controls">
                    <?php
                    echo $this->Form->select('types',
                        array('0'=>'dài','1'=>'căn trái trang','2'=>'căn phải trang')
                        , array(
                        "div" => array(
                            "title" => "types"
                        ),
                        "label" => false,
                        "class" => "span4",
                            'empty'=>false
                    ))
                    ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo __("Thứ tự");?></label>
                <div class="controls">
                    <?php
                    echo $this->Form->input('orders'
                        , array(
                            "div" => array(
                                "title" => "orders"
                            ),
                            "label" => false,
                            "class" => "span4",
                            'empty'=>false,
                            'type'=>'number'
                        ))
                    ?>
                </div>
            </div>
            <!-- <div class="control-group">
                <label class="control-label"><?php //echo __("Chiều cao khối");?></label>
                <div class="controls">
                    <?php
                   //echo $this->Form->input('height'
                    //    , array(
                    //        "div" => array(
                    //            "title" => "height"
                     //       ),
                     //       "label" => false,
                     //      "class" => "span4",
                      //      'empty'=>false,
                       //     'type'=>'number'
                       // ))
                    ?>
                </div>
            </div> -->


            <div class="control-group">
                <label class="control-label"><?php echo __("Hiển thị ở danh sách");?></label>
                <div class="controls" align="left">
                    <?php
                    echo $this->Form->checkbox('showhome'
                        , array(
                            "div" => array(
                                "title" => "showhome"
                            ),
                            "label" => false,
                            "class" => "span4",
                            'empty'=>false,
                            'type'=>'checkbox'
                        ))
                    ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo __("Hiển thị nút xem thêm");?></label>
                <div class="controls">
                    <?php
                    echo $this->Form->input('readmore'
                        , array(
                            "div" => array(
                                "title" => "readmore"
                            ),
                            "label" => false,
                            "class" => "span4",
                            'empty'=>false,
                        ))
                    ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php echo __("Hiển ở trang chủ");?></label>
                <div class="controls">
                    <?php
                    echo $this->Form->input('athome'
                        , array(
                            "div" => array(
                                "title" => "athome"
                            ),
                            "label" => false,
                            "class" => "span4",
                            'empty'=>false,
                        ))
                    ?>
                </div>
            </div>
			<!-- Form Action -->

            <div class="form-actions">
                <?php
                    echo $this->Form->button("Submit",array("type" => "submit","class"=>"btn btn-primary","div"=>false));
                    echo "&nbsp;";
					echo $this->Form->button("Reset", array("type" => "reset","class"=>"btn","div"=>false));
                ?>            </div><!--/ Form Action -->
		</section>
	<?php echo $this->Form->end();?>
</div>