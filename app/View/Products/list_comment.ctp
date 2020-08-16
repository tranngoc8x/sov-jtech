<?php foreach ($comments as $key => $value): ?>
    <h4><b><?php echo $value['Comments']['author_name']; ?>  </b><small> (<?php echo date("H:i d/m/Y",strtotime($value['Comments']['created'])); ?>)</small></h4>
    <p><?php echo $value['Comments']['body']; ?></p>

    <div class="function">
        <a class='showform' id='reply_<?php echo $value['Comments']['products_id'].'_'.$value['Comments']['id']; ?>' href="javascript:void(0)">Trả lời</a>
    </div>
    <?php if(!empty($value['children'])){?>
    <?php foreach ($value['children'] as $key1 => $value1){ ?>
        <div class="childrencmt">
         <h4><b><?php echo $value1['Comments']['author_name']; ?>   </b> <?php if($value1['Comments']['is_admin'] == true) echo '<span class="qtri">Quản trị viên</span>'?><small> (<?php echo date("H:i d/m/Y",strtotime($value1['Comments']['created'])); ?>)</small></h4>
        <p><?php echo $value1['Comments']['body']; ?></p>
        </div>
    <?php }}?>
    <div id="reply_<?php echo $value['Comments']['id']; ?>"></div>
    <hr>
<?php endforeach ?>