
<div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb-item "><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
        <li class="breadcrumb-item active"><?php echo $contentd['Content'][__('dbname')] ?></li>
    </ul>
    <div class="row">
            <div class="col-sm-12">
                <?php echo $contentd['Content'][__('dbcontent')] ?>
            </div>

    </div>
    <!-- /main -->
</div>
