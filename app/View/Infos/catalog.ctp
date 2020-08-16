<style>
    .numberlist{
            display: flex;
    background-color: rgba(10, 32, 56,.7);
    margin-top: 10px;
    min-height: 135px;
    color: white;
    padding: 15px 30px;
    font-size: 1.25em;
    -webkit-animation-name: bounceInRight;
    animation-name: bounceInRight;
    -webkit-animation-iteration-count: 1;
    animation-iteration-count: 1;
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-delay: 0s;
    animation-delay: 0s;
    -webkit-animation-timing-function: ease;
    animation-timing-function: ease;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}

</style>
<div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
         
        <li class="breadcrumb-item active">Tạ Quang Bửu qua các con số</li>
    </ul>
</div>

<div class="container numbers-wrapper section-wrapper">


    <div class="container by-the-numbers">
        <h2 class="section-header" style="text-transform: uppercase"><?php echo __("BYNUMBER") ?></h2>
        <div class="numbers-flex">
            <div class="row">
            <?php $cinfo =0; ?>
            <?php foreach ($infos as $in) :?>
                <?php if($in['Info']['showicon'] ==1): ?>
                    <?php $cinfo+=250;

                    ?>
                    <div class="col-sm-3" >
                        <div class="numberlist">
                        <div class="number-inner">
                            <?php if($in['Info']['showname'] ==1): ?>
                                <?=$in['Info'][__('dbname')] ?>
                            <?php endif ?>
                            <span><?=$in['Info'][__('dbcontent')] ?></span>
                            <?=$in['Info'][__('dbdesc')] ?>
                        </div>
                    </div>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>

        </div>
    </div>
    </div>
