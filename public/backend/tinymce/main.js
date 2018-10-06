
    tinymce.init({
		selector: 'textarea#content',
		height: 300,
		width:"",
		plugins: [
			"codemirror advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
		],
		toolbar1: "undo redo bold italic underline strikethrough cut copy paste| alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote searchreplace | styleselect formatselect fontselect fontsizeselect ",
		toolbar2: "table | hr removeformat | subscript superscript | charmap emoticons ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | link unlink anchor image media | insertdatetime preview | forecolor backcolor print fullscreen code ",
		image_advtab: true,
		image_advtab: true,
		menubar: false,
		toolbar_items_size: 'small',
        relative_urls: false, 
        remove_script_host : false,
        filemanager_title:"Quản lý hình ảnh",	
		external_filemanager_path: base_url()+"/file/",
		external_plugins: { "filemanager" : base_url()+"/file/plugin.min.js"},
    	/*filemanager_access_key:csrf(),*/
    });

	tinymce.init({
		 selector: 'textarea#desc',
		 toolbar_items_size: 'small',
		 height: 130,
		 width:"",
		 menubar: false,
		 plugins: [
			"advlist autolink lists link  charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars fullscreen",
			"insertdatetime  nonbreaking save table contextmenu directionality",
			/*"emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"*/
		],
		toolbar1: "undo redo bold italic underline | alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote link unlink anchor image media | preview | forecolor backcolor fullscreen code",
		image_advtab: true,
		menubar: false,
		toolbar_items_size: 'small',
        relative_urls: false,
        remove_script_host : false,
 		/*filemanager_title:"Quản lý hình ảnh",	
		external_filemanager_path: base_url()+"/file/",
		external_plugins: { "filemanager" : base_url()+"/file/plugin.min.js"},*/

	});

jQuery(document).ready(function($) {
	$('.modal_image').click(function(event) {
		/*$('.my-modal').modal('show')*/;
		/*$('#image_link_upload').attr('attribute', 'value');*/
		$('.my-modal').on('hide.bs.modal', function() {
		var url_img = $('#image_link_upload').val();
		$('.modal_image').attr('src', url_img);
	});
	});

	
});

	/*jQuery(document).ready(function($) {
		$('#show-media').click(function() {
			$('#media-modal').modal('show');
			// $('input#image').attr('value','sá');;
			$('#media-modal').on('hide.bs.modal',function(){
				var imgUrrl = $('#image').val();
				$('img#show-img').attr('src',imgUrrl);
				$('input#image').attr('value',imgUrrl);;
				// alert(imgUrrl);
			});
		});
	});
	*/

$(document).ready(function() {
	$("#name_backend").keyup(function(event) {
		var title, slug;
		title = $(this).val();
		 slug = title.toLowerCase();
		 //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    $("#slug").val(slug);
	});
});