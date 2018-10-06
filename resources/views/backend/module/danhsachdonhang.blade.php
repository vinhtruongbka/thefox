@extends('backend/main')
@section('backend')
<section class="content-header">
        <h1><i class="glyphicon glyphicon-th-list"></i> Danh sách đơn hàng</h1>
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
                                                <th >Khách hàng</th>
                                                <th>Ngày tạo</th>
                                                <th>Đơn hàng</th>
                                                <th>Số tiền</th>
                                                <th>Địa chỉ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      @foreach ($donhang as $donhangs)
                                         <tr>
                                        <td class="text-center" style="width:20px"><input name="checkboxid[]" type="checkbox" value="$id"></td>
                                        <td>{{ $donhangs->ordeid }}</td>
                                        <td  style="text-transform: capitalize;">{{ $donhangs->username }}</td>
                                        <td>{{ $donhangs->created_at }}</td>
                                        <td>{{ $donhangs->proname }}</td>
                                        <td>{{ number_format($donhangs->amount) }} VND</td>
                                        <td>
                                            {{ $donhangs->address }}
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