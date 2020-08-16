<div class="breadcumb">
    <div class="container">
        <ul>
            <li><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?>&raquo;</li>
            <li><?php echo $this->Html->link(__('SITEMAP'),array('controller'=>'contents','action'=>'index')) ?></li>
        </ul>
    </div>
</div>

<div class="container" style="padding-bottom: 80px;">
    <div class="row">
        <div class="col-sm-12">
            <ul style="margin-bottom:0">            <li><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
</ul>
            <?php
            $menus2 = $this->requestAction('menuitems/index/1');
            echo  $this->Menu->menu($menus2,array('extenda'=>'','dropdown'=>true,'class'=>"",'liclass'=>'',"dropdownClass"=>'','tagAttributes'=>array('class'=>'sitemap-menu')));
            ?>    
 
        </div>

    </div>
    <!-- /main -->
</div>
<style>
    
    .sitemap-menu .caret{
        display: none;
    }
</style>