<div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><?php echo $this->Html->link(__('HOMEPAGE'),array('controller'=>'news','action'=>'home')) ?></li>
        <li class="breadcrumb-item">Hỏi đáp</li>
    </ul>
    <div class="block">
        <div class="block-title">
            <h3>Đặt câu hỏi</h3>
        </div>
        <div class="row">
            <?php echo $this->Form->create("Question",array('url'=>'add'));?>
                <div class="col-sm-4">
                    <?php echo $this->Form->input('name',array('div'=>array('class'=>'form-group'),'label'=>false,"class"=>"form-control",'placeholder'=>'Họ tên'));?>
                    <?php echo $this->Form->input('phone',array('div'=>array('class'=>'form-group'),'label'=>false,"class"=>"form-control",'placeholder'=>'Điện thoại'));?>
                    <?php echo $this->Form->input('email',array('div'=>array('class'=>'form-group'),'label'=>false,"class"=>"form-control",'placeholder'=>'E-mail'));?>
                </div>
                <div class="col-sm-8">
                    <?php echo $this->Form->textarea('content',array('div'=>array('class'=>'form-group'),'label'=>false,"class"=>"form-control",'rows'=>6,'placeholder'=>'Nội dung câu hỏi'));?>
                </div>

                <div class="col-sm-8 col-sm-offset-4">
                    <div class="btn-group">
                    <?php echo $this->Form->submit("Gửi câu hỏi",array('div'=>false,"class"=>"btn btn-primary"));?>
                    <?php echo $this->Form->reset("Làm lại",array('div'=>false,"class"=>"btn btn-danger"));?>
                    </div>
                </div>
            <?php echo $this->Form->end();?>
        </div>
        <div class="block-title">
            <h3>Câu hỏi thường gặp</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-question">
            <?php foreach ($rated_questions as $question) :?>
                <li>
                    <a href="javascript: void(0)" class="question-sub" id="<?php echo $question['Question']['id'] ?>"><?php echo $question['Question']['content'] ?></a>
                    <div class="ans-content" id="ans<?php echo $question['Question']['id'] ?>">
                        <?php echo $question['Question']['reply'] ?>
                    </div>
                </li>


            <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="block-title">
            <h3>Câu hỏi của khách hàng</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <ul class="list-question">
            <?php foreach ($questions as $question) :?>
                <li>
                    <a href="javascript: void(0)" class="question-sub" id="0<?php echo $question['Question']['id'] ?>"><?php echo $question['Question']['content'] ?></a>
                    <div class="ans-content" id="ans0<?php echo $question['Question']['id'] ?>">
                        <?php echo $question['Question']['reply'] ?>
                    </div>
                </li>
            <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>



</div>

<?php $this->start('script');?>
<script>
    $(document).ready(function () {
        $(".question-sub").on('click',function () {
            var id = this.id;
            var ans = $("#ans"+id);
            if(ans.css('display') === 'none') {
                $(".ans-content").hide();
                $("#ans" + id).slideDown('slow');
            }else{
                $("#ans" + id).slideUp();
            }

        })
    });

</script>

<?php $this->end();?>
