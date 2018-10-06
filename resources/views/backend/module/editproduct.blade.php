@extends('backend/main')
@section('backend')
<form action="{{ route('sua_sanpham',['id'=>$sanpham->id]) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <section class="content-header">
            <h1><i class="glyphicon glyphicon-pencil"></i> Sửa sản phẩm</h1>
            <div class="breadcrumb">
                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button type = "submit" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-floppy-save"></span>
                    Lưu[Thêm]
                </button>
                <a class="btn btn-primary btn-sm" href="admin/product" role="button">
                    <span class="glyphicon glyphicon-remove do_nos"></span> Thoát
                </a>
            </div>
        </section>
       @if (Session::has('error'))
          <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Title!</strong>
              {{ Session('error') }}
          </div>
       @endif
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box" id="view">
                        <div class="box-body">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Tên sản phẩm <span class = "maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="name" style="width:100%" placeholder="Tên sản phẩm" id="name_backend" value="{{ $sanpham->name }}">
                                    @if ($errors->has('name'))
                                        <div class="help-block" style="color: red">
                                          {!!$errors->first('name')!!}
                                        </div>
                                      @endif
                                </div>
                                 <div class="form-group">
                                    <label>Đường dẫn tĩnh <span class = "maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="slug" style="width:100%" placeholder="Tên sản phẩm" id="slug" value="{{ $sanpham->slug }}">
                                   @if ($errors->has('slug'))
                                        <div class="help-block" style="color: red">
                                          {!!$errors->first('slug')!!}
                                        </div>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label>Loại sản phẩm<span class = "maudo">(*)</span></label>
                                    <select name="catid" class="form-control" style="width:300px;text-transform: capitalize;">
                                        <option value = "">[--Chọn loại sản phẩm--]</option>
                                           @foreach ($category as $categorys)
                                                  <option value='{{ $categorys->id }}' style="text-transform: capitalize;"
                                                    @if ($categorys->id == $sanpham->id_category)
                                                        {{ 'selected' }}
                                                    @endif
                                                    >{{ $categorys->name }}</option>
                                             @endforeach  
                                    </select>
                                </div>
                                  <div class="form-group ">
                                    <label>Tình trạng</label>
                                  <div class="form-inline">
                                     <div class="radio">
                                       <label>
                                           <input type="radio" value="1" name="merchandise" @if ($sanpham->merchandise == 1)
                                               checked 
                                           @else
                                              ''
                                           @endif >
                                           Còn hàng &nbsp;
                                       </label>

                                   </div>
                                   <div class="checkbox">
                                       <label>
                                           <input type="radio" value="0" name="merchandise" 
                                          @if ($sanpham->merchandise == 0)
                                               checked 
                                           @else
                                              ''
                                           @endif >
                                           Hết hàng
                                       </label>
                                       
                                   </div>
                                  </div>
                                   
                                </div>
                                  <div class="form-group">
                                    <label>Danh mục</label>
                                   <div class="checkbox">
                                       <label>
                                           <input type="checkbox" value="1" name="hot" 
                                            @if ($sanpham->hot == 1)
                                                {{ 'checked' }}
                                            @endif
                                           >
                                           Khuyến mãi hot
                                       </label>
                                   </div>
                                   
                                </div>
                                 <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="desc" id="desc">{{ $sanpham->description }}</textarea>
                                   @if ($errors->has('desc'))
                                        <div class="help-block" style="color: red">
                                          {!!$errors->first('desc')!!}
                                        </div>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label>Chi tiết sản phẩm</label>
                                    <textarea name="content" id="content" >{{ $sanpham->content }}</textarea>
                                    @if ($errors->has('content'))
                                        <div class="help-block" style="color: red">
                                          {!!$errors->first('content')!!}
                                        </div>
                                      @endif
                                   
                                </div>
                            
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control" style="width:300px">
                                        <option value="1">Xuất bản</option>
                                        <option value="0" >Chưa xuất bản</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Giá gốc</label>
                                    <input name="price" class="form-control" type="number" value="{{ $sanpham->price }}">
                                </div>
                             
                                <div class="form-group">
                                    <label>Giá khuyến mãi</label>
                                    <input name="sale_price" class="form-control" type="number" value="{{ $sanpham->sale_price }}">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Màu sắc</label>
                                    <input name="mau" class="form-control" type="text" value="{{ $sanpham->color }}">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Thương hiệu</label>
                                    <input class="form-control" type="text" value="{{ $sanpham->brand }}" name="brand">
                                    <div class="error" ></div>
                                </div>
                                <div class="form-group">
                                    <label>Upload ảnh nhỏ</label>
                                    <input name="image_link_4[]" class="form-control" type="file"  style="cursor: pointer;" multiple>
                                    <div class="error" id="password_error" ></div>
                                </div>
                              
                                <div class="form-group upload">
                                    <label>Chọn ảnh đại diện</label>
                                    <input type="hidden"  id="image_link_upload" name="anhdaidien" class="form-control">
                                  <img src="public/backend/images/admin/upload_anh.png" class="img-responsive modal_image" alt="Hình đại diện" data-toggle="modal" href='#modal-id' style="cursor: pointer;">

                                   <div class="modal fade my-modal" id="modal-id">
                                       <div class="modal-dialog  modal-lg">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                   <h4 class="modal-title">Upload ảnh</h4>
                                               </div>
                                               <div class="modal-body">
                                                   <iframe   src="file/dialog.php?field_id=image_link_upload" style="border: none;width: 100%;height: 400px;">
                                                    </iframe>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="modal fade my-modal" id="modal-id">
                                       <div class="modal-dialog  modal-lg">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                   <h4 class="modal-title">Upload ảnh</h4>
                                               </div>
                                               <div class="modal-body">
                                                   <iframe   src="file/dialog.php?field_id=image_link_upload" style="border: none;width: 100%;height: 400px;">
                                                    </iframe>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- /.box -->
                </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
    </form>
@endsection