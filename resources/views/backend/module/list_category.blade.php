@extends('backend/main')
@section('backend')
<section class="content-header">
        <h1><i class="glyphicon glyphicon-th-list"></i> Danh sách sản phẩm</h1>
        <div class="breadcrumb">
            <a class="btn btn-primary btn-sm" href="#" role="button">
                <span class="glyphicon glyphicon-plus"></span> Cập nhật
            </a>
            <a class="btn btn-primary btn-sm" href="#" role="button">
                <span class="glyphicon glyphicon-trash"></span> Thùng rác(0)
            </a>
        </div>
    </section>
   
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            @if (Session::has('success'))
                <p style="color: red"> <span class="glyphicon glyphicon-ok"> </span> <span>{{ session('success') }}</span></p>
            @endif

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
                                                <th >Tên loại sản phẩm</th>
                                                <th class="text-center">Ngày tạo</th>
                                                <th class="text-center">Ngày cập nhật</th>
                                                <th class="text-center">Trạng thái</th>
                                                <th class="text-center" style="width:50px">Sửa</th>
                                                <th class="text-center" style="width:50px">Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($category as $categorys)
                                                    <tr>
                                                        <td class="text-center" style="width:20px"><input name="checkboxid[]" type="checkbox" value="$id"></td>
                                                        <td>{{ $categorys->id }}</td>
                                                        <td  style="text-transform: capitalize;"><a href="">{{ $categorys->name }}</a></td>
                                                        <td class="text-center">{{ date_format($categorys->created_at,"d/m/Y") }}</td>
                                                        <td class="text-center">{{ date_format($categorys->updated_at,"d/m/Y") }}</td>
                                                        <td class="text-center">
                                                            @if ( $categorys->status ==1)
                                                               <span><span class="glyphicon glyphicon-ok-circle" style="color: green"></span> Xuất bản</span>
                                                            @else
                                                               <span><span class="glyphicon glyphicon-remove" style="color: red"></span>Bản nháp</span>
                                                            @endif
                                                        </td>
                                                   
                                                    <td class="text-center">
                                                        <a class="btn btn-success btn-xs" href="{{ route('backend.suadanhmuc',['id'=>$categorys->id])}}">
                                                            <span class="glyphicon glyphicon-edit"></span>Sửa
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-danger btn-xs" href="" role="button">
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
                                        <li class="hidden-xs"><a>Trang đầu</a></li>
                                        <li><a>Trước</a></li>
                                        <li class="active"><a>1</a></li>
                                        <li><a href="admin/product/2">Sau</a></li>
                                        <li class="hidden-xs"><a href="">Trang cuối</a></li>                                   
                                    </ul>
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