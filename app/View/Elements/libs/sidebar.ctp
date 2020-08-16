<?php echo $this->element("libs/tabsActive");?>
<script type="text/javascript">
$(function() {
    //$("ul#navigation li").size();
    $("ul#navigation li.accordion-group").each(function(x){
        $(this).find("a").first().attr("href","#submenu" + x);
        $(this).find("ul.collapse").first().attr("id","submenu" + x);
    });
    $('li.accordion-group').eq(tabx).addClass(function(){
        $(this).addClass('active');
        $(this).find("ul.collapse").addClass("in");
        //$(this).find("ul.collapse").find('li').addClass("active");
        var urlx = window.location.pathname;
       // console.log(urlx);
        $('a[href="'+ urlx +'"]').parent().addClass('active');
    });
});
</script>
<div class="sidebar-content">
    <!-- START Sidebar Menu -->
    <nav id="nav" class="accordion">
        <ul id="navigation">
            <!-- START Menu Divider -->
            <li class="divider">Chức năng</li>
            <!--/ END Menu Divider -->
            <!-- START Menu -->
            <li class="accordion-group">
                <a data-toggle="collapse" data-parent="#navigation">
                    <span class="icon icone-list"></span>
                    <span class="text">Quản lý bài viết</span>
                    <span class="arrow icone-caret-down"></span>
                </a>
                <!-- START Submenu Menu -->
                <ul class="collapse">
                	<li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Giới thiệu",array('plugin'=>false,"controller"=>"abouts","action"=>"index"),array("class"=>" ","escape"=>false));?>
                    </li>
                     
                    <li class=""><?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Tin tức",array('plugin'=>false,"controller"=>"news","action"=>"index"),array("class"=>" ","escape"=>false));?></li>
                <!--  <li><?php // echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Danh sách liên hệ",array('plugin'=>false,"controller"=>"contacts","action"=>"index"),array("class"=>" ","escape"=>false));?></li>  -->

                    
                 </ul>
                <!--/ END Submenu Menu -->
            </li>
            <!--/ END Menu -->
            <!-- START Menu -->
            <li class="accordion-group">
                <a data-toggle="collapse" data-parent="#navigation">
                    <span class="icon icone-file"></span>
                    <span class="text">Sản phẩm</span>
                    <span class="arrow icone-caret-down"></span>
                </a>
                <!-- START Submenu Menu -->
                <ul class="collapse">
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Danh mục sản phẩm",array('plugin'=>false,"controller"=>"catalogs","action"=>"index"),array("class"=>" ","escape"=>false));?>
                    </li>
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Sản phẩm",array('plugin'=>false,"controller"=>"products","action"=>"index"),array("class"=>" ","escape"=>false));?>
                    </li>
                </ul>
                <!--/ END Submenu Menu -->
            </li>
            <!-- START Menu -->
            <li class="accordion-group">
                <a data-toggle="collapse" data-parent="#navigation">
                    <span class="icon icone-file"></span>
                    <span class="text">Media</span>
                    <span class="arrow icone-caret-down"></span>
                </a>
                <!-- START Submenu Menu -->
                <ul class="collapse">
                     <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Slider trang chủ",array('plugin'=>false,"controller"=>"sliders","action"=>"index"),array("class"=>" ","escape"=>false));?>
                    </li>
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Thư viện video",array('plugin'=>false,"controller"=>"videos","action"=>"index"),array("class"=>" ","escape"=>false));?>
                    </li>
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Thư viện ảnh",array('plugin'=>false,"controller"=>"galleries","action"=>"index"),array("class"=>" ","escape"=>false));?>
                    </li>
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Đối tác",array('plugin'=>false,"controller"=>"partners","action"=>"index"),array("class"=>" ","escape"=>false));?>
                    </li>
                </ul>
                <!--/ END Submenu Menu -->
            </li>
            <!--/ END Menu -->

            

            <!-- START Menu -->
            <li class="accordion-group ">
                <a data-toggle="collapse" data-parent="#navigation">
                    <span class="icon icone-user"></span>
                    <span class="text">Người dùng</span>
                    <span class="arrow icone-caret-down"></span>
                </a>
                <!-- START Submenu Menu -->
                <ul class="collapse">
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Danh sách người dùng",array('plugin'=>false,'controller'=>'users','action'=>'index'),array('escape'=>false));?>
                    </li>
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Phân quyền người dùng",array('plugin'=>'acl','controller'=>'aros','action'=>'user_permissions'),array('escape'=>false));?>
                    </li>
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Nhóm người dùng",array('plugin'=>false,'controller'=>'groups','action'=>'index'),array('escape'=>false));?>
                    </li>
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Phân quyền nhóm người dùng",array('plugin'=>'acl','controller'=>'aros','action'=>'role_permissions'),array('escape'=>false));?>
                    </li>
                </ul>
                <!--/ END Submenu Menu -->
            </li>
            <!--/ END Menu -->

            <!-- START Menu -->
            <li class="accordion-group ">
                <a data-toggle="collapse" data-parent="#navigation">
                    <span class="icon icone-cogs"></span>
                    <span class="text">Cài đặt chung</span>
                    <span class="arrow icone-caret-down"></span>
                </a>
                <!-- START Submenu Menu -->
                <ul class="collapse">
<!--                    <li class=""> --><?php //echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Banner trang web",array('plugin'=>false,'controller'=>'contents','action'=>'index','header'),array('escape'=>false));?><!--</li>-->
<!--                    <li class="">-->
<!--                       -->
<!--                        --><?php //echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Thông tin trang web",array('plugin'=>false,'controller'=>'contents','action'=>'index','footer'),array('escape'=>false));?>
<!--                    </li>-->

                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Main menu  ",array('plugin'=>false,'controller'=>'menuitems','action'=>'index',2),array('escape'=>false));?>
                    </li>

                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Thông tin liên hệ",array('plugin'=>false,'controller'=>'contents','action'=>'index','contact'),array('escape'=>false));?>
                    </li>
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Thông tin header",array('plugin'=>false,'controller'=>'contents','action'=>'index','header'),array('escape'=>false));?>
                    </li>

                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Thông tin footer",array('plugin'=>false,'controller'=>'contents','action'=>'index','footer'),array('escape'=>false));?>
                    </li>

                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Thông tin footer 2",array('plugin'=>false,'controller'=>'contents','action'=>'index','footer2'),array('escape'=>false));?>
                    </li>
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Điện thoại liên hệ",array('plugin'=>false,'controller'=>'contents','action'=>'index','phone'),array('escape'=>false));?>
                    </li>
                    <li class="">
                        <?php echo $this->Html->link("<span class=\"icon icone-angle-right\"></span>Thông tin khác",array('plugin'=>false,'controller'=>'contents','action'=>'index','others'),array('escape'=>false));?>
                    </li>
                </ul>
                <!--/ END Submenu Menu -->
            </li>
            <!--/ END Menu -->
        </ul>
    </nav>
    <!--/ END Sidebar Menu -->
</div>