@extends('backend/main')
@section('backend')
<form action="{{ route('postsuadanhmuc',['id'=>$category->id]) }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <section class="content-header">
            <h1><i class="glyphicon glyphicon-pencil"></i> Sửa danh mục</h1>
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
          
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box" id="view">
                        <div class="box-body">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label>Tên danh mục <span class = "maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="name" style="width:100%;text-transform: capitalize;" id="name_backend" value="{{ $category->name }}">
                                    @if ($errors->has('name'))
                                        <div class="help-block" style="color: red">
                                          {!!$errors->first('name')!!}
                                        </div>
                                      @endif
                                </div>
                                 <div class="form-group">
                                    <label>Đường dẫn tĩnh <span class = "maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="slug" style="width:100%"  id="slug" value="{{ $category->slug }}">
                                   @if ($errors->has('slug'))
                                        <div class="help-block" style="color: red">
                                          {!!$errors->first('slug')!!}
                                        </div>
                                      @endif
                                </div>
                              
                                 <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="desc" id="desc" >{{ $category->desc }}</textarea>
                                   @if ($errors->has('desc'))
                                        <div class="help-block" style="color: red">
                                          {!!$errors->first('desc')!!}
                                        </div>
                                      @endif
                                </div>
                             
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control" style="width:300px">
                                        <option value="1">Xuất bản</option>
                                        <option value="0">Chưa xuất bản</option>
                                    </select>
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