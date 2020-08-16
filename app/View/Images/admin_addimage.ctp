<?php
/**
 * @author			Trần Ngọc Thắng
 * @link			https://facebook.com/tranngoc8x
 * @version			Cake 2.4
 */
echo $this->start('script');
?>
<?php echo $this->Html->css(array('../libs/multiupload/css/jquery.filer','../libs/multiupload/css/themes/jquery.filer-dragdropbox-theme')) ?>
     <!--jQuery-->
    <?php echo $this->Html->script(array('../libs/multiupload/js/jquery.filer.min'));?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#fileupload').filer({
            limit: null,
            maxSize: null,
            extensions: ['jpg','png','gif','bmp','jpeg'],
            changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Kéo & thả ảnh vào đây</h3> <span style="display:inline-block; margin: 15px 0">hoặc</span></div><a class="jFiler-input-choose-btn blue">Chọn ảnh</a></div></div>',
            showThumbs: true,
            appendTo: null,
            theme: "dragdropbox",
            templates: {
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: false,
                removeConfirmation: false,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            // uploadFile: {
            //     url: "#",
            //     data: {},
            //     type: 'POST',
            //     enctype: 'multipart/form-data',
            //     beforeSend: function(){},
            //     success: function(data, el){
            //         var parent = el.find(".jFiler-jProgressBar").parent();
            //         el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
            //             $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
            //         });
            //     },
            //     error: function(el){
            //         var parent = el.find(".jFiler-jProgressBar").parent();
            //         el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
            //             $("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i> Error</div>").hide().appendTo(parent).fadeIn("slow");
            //         });
            //     },
            //     statusCode: {},
            //     onProgress: function(){},
            // },
            dragDrop: {
                dragEnter: function(){},
                dragLeave: function(){},
                drop: function(){},
            },
            addMore: true,
            clipBoardPaste: true,
            excludeName: null,
            beforeShow: function(){return true},
            onSelect: function(){},
            afterShow: function(){},
            onRemove: function(){},
            onEmpty: function(){},
            captions: {
                button: "Choose Files",
                feedback: "Choose files To Upload",
                feedback2: "files were chosen",
                drop: "Drop file here to Upload",
                removeConfirmation: "Are you sure you want to remove this file?",
                errors: {
                    filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
                    filesType: "Không đúng định dạng",
                    filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
                    filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
                }
            }
        });
    });
    </script>

    <style>
        .file_input{
            display: inline-block;
            padding: 10px 16px;
            outline: none;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            white-space: nowrap;
            font-family: sans-serif;
            font-size: 11px;
            font-weight: bold;
            border-radius: 3px;
            color: #008BFF;
            border: 1px solid #008BFF;
            vertical-align: middle;
            background-color: #fff;
            margin-bottom: 10px;
            box-shadow: 0px 1px 5px rgba(0,0,0,0.05);
            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            transition: all 0.2s;
        }
        .file_input:hover,
        .file_input:active {
            background: #008BFF;
            color: #fff;
        }
    </style>
    <?php echo $this->end() ?>
<div class="row-fluid">
	<?php echo $this->Form->create('Image',array("class"=>"span12 widget stacked dark form-horizontal bordered",'type' => 'file')); ?>
	<header><h4 class="title">Thêm mới hình ảnh</h4></header>
        <section class="body">
            <div class="body-inner">
                <?php
                    echo $this->Form->hidden("galleries_id",array('value'=>$galleries));
                ?>
				<div class="control-group">
                        <?php echo $this->Form->input("url",array("type"=>"file",'multiple',"label"=>false,"div"=>array('class'=>''),'class'=>'','id'=>'fileupload'));  ?>
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