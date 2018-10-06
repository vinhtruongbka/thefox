@extends('backend/main')
@section('backend')
  {{-- expr --}}
<section class="content-header">
    <h1><i class="glyphicon glyphicon-th-list"></i> Danh sách sản phẩm</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('backend.addproduct') }}" role="button">
            <span class="glyphicon glyphicon-plus"></span> Thêm mới
        </a>
        <a class="btn btn-primary btn-sm" href="#recyclebin" role="button">
            <span class="glyphicon glyphicon-trash"></span> Thùng rác(0)
        </a>
    </div>
</section>
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box" id="view">

<div class="box-body" style="display: block;">
    <div class="row" style="padding:0px; margin:0px;">
        <!--ND-->
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text -center" style="width:10px;"><input name="checkAll" id="checkAll" type="checkbox"></th>
                        <th class="text-center" style="width:20px">ID</th>
                        <th>Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th class="text-center">Tình trạng</th>
                        <th class="text-center">Trạng thái</th>
                    
                        <th class="text-center" style="width:50px">Sửa</th>
                        <th class="text-center" style="width:50px">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sanpham as $sanphams)
                        <tr>
                        <td class="text-center" style="width:20px"><input name="checkboxid" type="checkbox" value=""></td>
                        <td class="text-center">{{$sanphams->proid}}</td>
                        <td style="width:50px">
                            <img src="uploads/images/{{$sanphams->image_link}}" alt="Chưa có hình" class="img-responsive">
                        </td>
                        <td><a href="#update/191" >{{$sanphams->produc_name}}</a></td>
                        <td style="text-transform: capitalize">{{$sanphams->category_name}}</td>
                        <td class="text-center"> 
                            @if ($sanphams->merchandise == 1)
                               <span><span class="glyphicon glyphicon-ok-circle" style="color: green"></span> Còn hàng</span>
                            @else
                                <span><span class="glyphicon glyphicon-remove" style="color: red"></span> Hết hàng</span>
                            @endif
                        </td>
                        <td class="text-center"> 
                            @if ( $sanphams->status ==1)
                               <span><span class="glyphicon glyphicon-ok-circle" style="color: green"></span> Xuất bản</span>
                            @else
                               <span><span class="glyphicon glyphicon-remove" style="color: red"></span>Bản nháp</span>
                            @endif</td>
                    
                    <td class="text-center">
                        <a class="btn btn-success btn-xs" href="{{ route('backend.suasanpham',$sanphams->proid) }}" role="button">
                            <span class="glyphicon glyphicon-edit"></span>Sửa
                        </a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-danger btn-xs" href="{{ route('backend.xoasanpham',$sanphams->proid) }}" role="button">
                            <span class="glyphicon glyphicon-trash"></span>Xóa
                        </a>
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <ul class="pagination">
                <li class="hidden-xs"><a>Trang đầu</a></li><li><a>Trước</a></li><li class="active"><a>1</a></li><li><a href="admin/product/2">2</a></li><li><a href="admin/product/3">3</a></li><li><a href="admin/product/4">4</a></li><li><a href="admin/product/5">5</a></li><li><a href="admin/product/2">Sau</a></li><li class="hidden-xs"><a href="admin/product/9">Trang cuối</a></li>                                   </ul>
            </div>
        </div>
        <!-- /.ND -->
    </div>
</div><!-- ./box-body -->
</div><!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
@endsection