
/*----------------------------------------------------*/
/*  Sidebar Scrollable
/*----------------------------------------------------*/
$(function () {
    if(jQuery().perfectScrollbar) {
		$('#sidebar').perfectScrollbar();
    }
});

/*----------------------------------------------------*/
/*  Sidebar toggler
/*----------------------------------------------------*/
$(function () {
	$('[data-toggle="sidebar"]').click(function (e) {

		$(this).toggleClass('active');
		$('html').toggleClass('nav-open');

		e.preventDefault();
	});
});

/*----------------------------------------------------*/
/*  Sidebar Height - ie8 Fix
/*----------------------------------------------------*/
$(function () {
	if($('html').hasClass('lt-ie9')) {
		$('#sidebar').css('min-height', $('#main').height());
	}
	$('#sidebar').resize(function(){
		var $this = $(this);
		$('#main').css('min-height', $this.height());
	});
	$('#sidebar').resize();
});

/*----------------------------------------------------*/
/*  Widget Collapse
/*----------------------------------------------------*/
$(function () {
	$('.toolbar [data-toggle="collapse"]').on('click', function (e) {
		$icon = $(this).children('.icon');

		if($(this).hasClass('collapsed')) {
			$icon.removeClass('icone-chevron-down').addClass('icone-chevron-up');
		}else{
			$icon.removeClass('icone-chevron-up').addClass('icone-chevron-down');
		}
		e.preventDefault();
	});
});

/*----------------------------------------------------*/
/*  Widget Refresh Modal
/*----------------------------------------------------*/
$(function () {
	$('[data-widget="refresh"]').on('click', function (e) {
		var $modal = $('<div class="widget-modal"><span class="spinner spinner1"></span></div>');
		var $target = $(this).parents('.widget');

		// append to widget
		$target.append($modal);

		// remove after 3 second
		setTimeout(function () {
			$modal.remove();
		}, 2000);

		e.preventDefault();
	});
});

/*----------------------------------------------------*/
/*  Toggle status
/*----------------------------------------------------*/
$(function(){
	$("div.toggle_div").on("click",function(){
		// alert(1);
		var id_div = $(this).attr("id");
		var arid = id_div.split("_");
		id = arid[1];
		var status = arid[2];
		var new_status = $("#toggle_div_span_"+id).attr('data-content');
		var part_url = arid[3];
		var new_id = arid[0] + "_" + arid[1] + "_" + new_status + "_" + part_url;
		//alert(parturl);
		//console.log(new_status);
		var pathname = window.location.pathname;
		
		pathname = pathname.split(part_url);
		//console.log(pathname[0]);
		var url1 =pathname[0]+part_url+"/toggle/" + id + "/" + new_status;
		$("#toggle_div_span_"+id + "_spinner").show();
		$("#toggle_div_span_"+id).hide();
		$.ajax({
			url: url1,
			dataType: "html",
			cache: false,
			success: function (data, textStatus)
			{
				if(data == 1){
					var html = "";

					if(status == 2){
						html = "<span data-content="+status+" id=\"toggle_div_span_"+id+"\" title=\"Ẩn\" class='icon icone-remove red pointer'></span>";
					}else{
						html = "<span data-content="+status+" id=\"toggle_div_span_"+id+"\" title=\"Hiển thị\" class='icon icone-ok green pointer'></span>";
					}
				}else{
						html = "<span title=\"Có lỗi xảy ra. Thử bấm f5 để load lại\" class='icon icone-warning-sign yealow'></span>";
				}
				$("#"+id_div).html(html);
				$("#"+id_div).attr("id",new_id);
			},
			complete: function()
			{

				$("#toggle_div_span_"+id + "_spinner").hide();
			}
		});
	});
});

/*----------------------------------------------------*/
/*  To Top Scroller
/*----------------------------------------------------*/
$(function () {
	$('.totop').click(function (e){
		$("html, body").animate({ scrollTop: 0 }, 600);
		e.preventDefault();
	});
});