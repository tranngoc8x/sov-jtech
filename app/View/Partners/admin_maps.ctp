<div class="row-fluid">
    <div class="col-lg-12">
        <div id="partnermap" style="height: 500px; width:656px;margin: 0 auto;border: 1px solid #000;margin-bottom: 100px;background: url('/img/bgmaps.png') bottom center no-repeat; position: relative">
            <?php foreach ($list as $k=>$v): ?>
                <a href="<?=$v['Partner']['link']?>" target="_blank"><?php echo $this->Html->image("/files/uploads/partners/".$v['Partner']['image'],array('id'=>$v['Partner']['id'],'class'=>'partner','style'=>"top:{$v['Partner']['top']}px;left:{$v['Partner']['left']}px")) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".partner").draggable({
            containment: '#partnermap',
            scroll: false
        }).mousemove(function(){
            var coord = $(this).position();
            //$("p:last").text( "left: " + coord.left + ", top: " + coord.top );
        }).mouseup(function(){
            var coord = $(this).position();
            var id = $(this).attr('id');
            var item={id:id, left:  coord.left, top: coord.top  };
            $.post('/admin/partners/savemap', item, function(response){
                //console.log(response);
            });
        });

    });
</script>
<style>
    .partner{
        position: absolute;
        width: 120px;
    }
</style>