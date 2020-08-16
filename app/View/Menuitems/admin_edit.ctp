<div class="row-fluid">
    <?php echo $this->Form->create("Menuitem",array("class"=>"span12 widget stacked dark form-horizontal bordered"));?>
        <header><h4 class="title">Nhập thông tin</h4></header>
        <section class="body">
            <div class="body-inner">
                <div class="control-group">
                    <label class="control-label"><?php echo __("title");?></label>
                    <div class="controls">
                        <?php
                        	echo $this->Form->input('id');
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
                    <label class="control-label"><?php echo __("Tên tiếng anh");?></label>
                    <div class="controls">
                        <?php
                        	echo $this->Form->input('id');
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
                    <label class="control-label"><?php echo __("Đường dẫn");?></label>
                    <div class="controls">
                        <?php
                            echo $this->Form->input("url", array(
                                "div" => array(
                                    "title" => "Đường dẫn",
                                    "style" =>"display:inline-block"
                                ),
                                "label" => false
                            ));
                        ?>
                        <a class="btn btn-info" data-toggle="modal" data-target="#modal3">Chọn link</a>
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
								"class" => "select2"
							));
                        ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Loại menu</label>
                    <div class="controls">
                        <?php
							echo $this->Form->input("menus_id", array(
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
<style>
    #listcontent li{
        border-bottom: 1px solid #f2f2f2;
    }
#listcontent li a{
    float: right;
}
</style>
<div id="modal3" class="modal hide" data-backdrop="false">
    <div class="modal-header">
        <h4 id="myModalLabel">Chọn đường dẫn</h4>
    </div>
    <div class="modal-body">
        <div id="content_chooser">


            <ul id="listcontent">
                <li>Link trống  <a href='javascript:void(0);' data-content='#' class='click_chooser'>Chọn</a></li>
                <li>Trang chủ  <a href='javascript:void(0);' data-content='controller:news/action:home' class='click_chooser'>Chọn</a></li>
                <li>Giới thiệu <a href='javascript:void(0);' data-content='controller:abouts/action:index' class='click_chooser'>Chọn</a>
                    <ul>
                        <?php
                            $mnabouts = $this->requestAction('abouts/listmenu');
                            foreach ($mnabouts as $k => $v) {
                                echo "<li>".$v['About']['name']."<a href='javascript:void(0);' data-content='controller:abouts/action:view/id:{$v['About']['id']}' class='click_chooser'>Chọn</a></li>";
                            }
                        ?>
                    </ul>
                </li>




                <li>Bài viết <a href='javascript:void(0);' data-content='controller:news/action:index' class='click_chooser'>Chọn</a>
                    <ul>
                        <li>Sự kiện <a href='javascript:void(0);' data-content='controller:events/action:index' class='click_chooser'>Chọn</a></li>
                    <?php
                    $mnnews = $this->requestAction('news/listmenu');
                    foreach ($mnnews as $k => $v) {
                        echo "<li>".$v."<a href='javascript:void(0);' data-content='controller:news/action:index/id:{$k}' class='click_chooser'>Chọn</a></li>";
                    }
                    ?>
                    </ul>
                </li>
                <li>Sản phẩm <a href='javascript:void(0);' data-content='controller:products/action:index' class='click_chooser'>Chọn</a>
                    <ul>
                        <?php
                        $mnnews = $this->requestAction('products/listmenu');
                        foreach ($mnnews as $k => $v) {
                            echo "<li>".$v."<a href='javascript:void(0);' data-content='controller:products/action:index/id:{$k}' class='click_chooser'>Chọn</a></li>";
                        }
                        ?>
                    </ul>
                </li>

                 <li>Dịch vụ<a href='javascript:void(0);' data-content="controller:services/action:index" class='click_chooser'>Chọn</a></li>
                <li>Liên hệ<a href='javascript:void(0);' data-content="controller:contacts/action:index" class='click_chooser'>Chọn</a></li>
            </ul>





         </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
    </div>
</div><!--/ Modal With No Backdrop -->

<script>

    $(function(){
        $('.click_chooser').on('click',function(){
            var result_chooser = $(this).attr('data-content');
            $('#MenuitemUrl').val(result_chooser);
        });
    });
</script>