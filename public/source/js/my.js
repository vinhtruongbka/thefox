jQuery(document).ready(function($) {

	 $("#zoom_01").elevateZoom();

	 /*
	 Ảnh nhỏ
	  */
	 
	 $('.anhnho > li > img').click(function(event) {
	 	var img = $(this).attr('src');
	 	$('.anhlon').attr({
	 		'src': img,
	 	});
	 	$('.anhnho > li > img').removeClass('viendo');
	 	$(this).addClass('viendo');
	 });

	 /*
	 Kích thước
	  */
	 $('.kich-thuoc-2 > div').click(function(event) {
	 	var kichthuoc = $(this).text();
	 	$('#kichthuocchon').text(kichthuoc);
	 	$('.kich-thuoc-2 > div').removeClass('viendo');
	 	$(this).addClass('viendo');
	 });

	 /*
	 Số lượng
	  */

	 $('#tang').click(function(event) {
	 	var soluong = parseInt($('#soluong_mua').html());
	 	$('#soluong_mua').html(soluong >= 10 ? 10 : soluong + 1);
	 });
	  $('#giam').click(function(event) {
	 	var soluong = parseInt($('#soluong_mua').html());
	 	$('#soluong_mua').html(soluong <= 1 ? 1 : soluong - 1);
	 });

    /*
    aaa
  

	  /*
	  Giỏ hàng
	   */

	  $('.giohang2').click(function(event) {
	  	//Cho vào giỏ hàng
	  	event.preventDefault();
	  	var href = $(this).attr('href');
	  	var soluongmua = parseInt($('#soluong_mua').html());
	  	 
	  	 //Thay đổi giỏ hàng
	  	 var count_item = parseInt($('.count_item').html());
	  	 $('.count_item').html(count_item+soluongmua);

	  	 // Lấy giá trị giỏ hàng
	  	var kichthuoc = parseInt($('#kichthuocchon').html());
	  	var soluong = parseInt($('#soluong_mua').html());
	  	/*var url = href+'?soluong='+soluong+'&kichthuoc='+kichthuoc;*/
	  	// alert(url);
	  /*	location.assign(url);*/
	  /*	jQuery.get(url, function(data) {
	  	  console.log('ok');
	  	 });*/

	  	/* jQuery.get('/path/to/file', {param1: 'value1'}, function(data, textStatus, xhr) {
	  	   //optional stuff to do after success
	  	 });
	  	 */
	  	
	 /* 	jQuery.get(href, {soluong: soluong,kichthuoc: kichthuoc}, function(data) {
	  		
	  		var returnedData = JSON.parse(json: string);
	  		$.each(data, function(index, val) {
	  			console.log(val['kichthuoc']);
	  		});

	  		console.log(returnedData);
	  	  
	  	});*/

	  	jQuery.ajax({
	  	  url: href,
	  	  type: 'GET',
	  	  dataType: 'json',
	  	  data: {soluong: soluong,kichthuoc: kichthuoc},
	  	  
	  	  success: function(data) {
	  	  	/*for (var i in data.content) {
	  	  			console.log(data.content[i].qty);
	  	  	}*/
	       
	  	  	var html = '';
	  	    for(var i in data.content){
	  	    	/*console.log(data.content[i]);*/
	  	    	html += '<div class="row giohang_pop" id="'+data.content[i].id+'">';
					html +='<div class="col-md-6" style="margin-top: 5px;">';
						html +='<div class="sanpham-poup pop-sanpham">';
							html +='<img src="uploads/images/'+data.content[i].options.img+'" alt="" class="img-responsive">';
						html +='</div>';
						html +='<div class="pop-sanpham pop-sanpham-2">';
							html +='<p>'+data.content[i].name+'</p>';
							html +='<p>'+data.content[i].options.kichthuoc+' / '+data.content[i].options.color+'</p>';
							html +='<p class="xoasanpham">';
							html +='<a href="xoa/'+data.content[i].rowId+'"'+data.content[i].name+'" class="btn-delete" data-id="'+data.content[i].id+'" style="color: red;"><i class="fa fa-close my-fa-close">&nbsp; Xóa sản phẩm</i></a>';
							html +='</p>';
						html +='</div>';
					html +='</div>';
					html +='<div class="col-md-2">';
						html +='<p class="pop-gia" >'+ data.content[i].price +'</p>';
					html +='</div>';
					html +='<div class="col-md-2">';
						html +='<p class="pop-gia" id="soluong_pop'+data.content[i].id+'" style="text-align: center;">'+data.content[i].qty +'</p>';
					html +='</div>';
					html +='<div class="col-md-2">';
						html +='<p class="pop-gia" id="thanhtien'+data.content[i].id+'">' + data.content[i].price * data.content[i].qty +'</p>';
					html +='</div>';
				html +='</div>';
		
	  	    }

	  	    var htmlcount = '<p>Giỏ hàng của bạn có <span style="color: red" id="data_count">'+data.count+'</span> sản phẩm</p>';
	  	    var htmltotal = ' <p>Tổng tiền thanh toán: <span style="color: red" id="tongtien_pop">'+data.total+'</span>₫</p>'
	  	   
	  	    $('#cart-content').html(html);
	  	    $('.htmlcount').html(htmlcount);
	  	    $('.htmltotal').html(htmltotal);
	  	  }
	  	  
	  	});
	  	
	  	
	  	 
	  });
      
       /*
    aaa
     */
    $(document).on('click','a.btn-delete',function(e){
    	event.preventDefault();
    	var hrefpoup = $(this).attr('href');
        var id = $(this).attr('data-id');
        var data_count = parseInt($('#data_count').html());
        var soluong_pop = parseInt($('#soluong_pop'+id).html());
        var tongtien_pop = parseInt($('#tongtien_pop').html());
        var thanhtien = parseInt($('#thanhtien'+id).html());
        var check = confirm('Bạn muốn xóa sản phẩm này không');
        if (check) {
        	jQuery.get(base_url()+hrefpoup, function(data) {
    		/*confirm('Bạn muốn xóa sản phẩm này không ?');*/
    	   $("#"+id).remove();
    	   $("#data_count").html(data_count-soluong_pop);
    	   $("#tongtien_pop").html(tongtien_pop-thanhtien);
    	   $(".count_item ").html(data_count-soluong_pop);
    	  });
        }else {
        	return false;
        }

    	
    	
    	
    });

    
});