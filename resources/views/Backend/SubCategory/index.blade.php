@extends('Admin.admin_master')
@section('title','Danh mục con Fsc')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-3 col-xl-2">
                                <img src="{{asset('Backend/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
                            </div>
                            <div class="col-5 col-sm-7 col-xl-8 p-0">
                                <h4 class="mb-1 mb-sm-0">Chào mừng đến hệ thống quản lí của FSC </h4>

                            </div>
                            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
        <a href=" {{ url('/') }} " target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Truy cập giao diện ? </a>
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Trang danh mục con </h4>

                    <form action="#" style=" width: 250px; position: absolute; right: 20px; margin-top: -40px">
                        <input type="text" class=" form-search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Tìm kiếm...">
                        <button type="submit" class="bg-primary" value="btn-search" style="width: 40px; height: 34px">
                            <i class="fa-solid fa-magnifying-glass text-light"></i>
                        </button>
                    </form>

                    <div class="template-demo">
                        <a href="{{url('Admin/subcategory/create')}}"><button type="button" class="btn btn-primary btn-fw" style="float: right;">Thêm danh mục con</button></a>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th>Danh mục con English </th>
                                <th>Danh mục con Vietnamese </th>
                                <th>Trạng thái</th>
                                <th>Người tạo</th>
                                <th>Quản trị</th>

                            </tr>
                            </thead>

                            <tbody>
                            @if($subcategory->total()>0)
                                @php($i = 1)
                                @foreach($subcategory as $row)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$row->subC_en}}</td>
                                        <td>{{$row->subV_vie}}</td>
                                        @if($row->status==1)
                                            <td ><span class="btn btn-success btn-sm" style="cursor: default">Hiển thị</span></td>
                                        @else
                                            <td ><span class="btn btn-danger btn-sm " style="cursor: default">Không hiển thị</span></td>
                                        @endif


                                        <td>{{$row->nguoitao}} <br> <small>  @if($row->ngaysua==null) đã tạo ngày {{$row->datetime}}  @else đã sửa ngày {{$row->ngaysua}} @endif </small></td>
                                        <td>
                                            <a href="{{route('subcategory.edit', $row->id)}}" class="btn btn-info">Sửa</a>
                                            <a href="{{route('subcategory.delete', $row->id)}}" onclick="return confirm('Bạn chắc chứ?')" class="btn btn-danger">Xóa</a>
                                            <a href=""  class="btn btn-primary">Danh mục cha</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="text-danger">
                                    <td colspan="9" class="text-center pt-3">Không tìm thấy bản ghi nào</td>
                                </tr>
                            @endif
                            </tbody>

                        </table>
                        {{$subcategory->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
@endsection
