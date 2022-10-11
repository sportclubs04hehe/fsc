@extends('Admin.admin_master')
@section('title','Danh mục')
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
                    <h4 class="card-title">Trang danh mục </h4>

                    <form action="#" style=" width: 250px; position: absolute; right: 20px; margin-top: -40px">
                        <input type="text" class=" form-search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Tìm kiếm...">
{{--                        <input type="submit" style="width: 88px" name="btn-search" value="Search" class="btn btn-primary">--}}
                        <button type="submit" class="bg-primary" value="btn-search" style="width: 40px; height: 34px">
                            <i class="fa-solid fa-magnifying-glass text-light"></i>
                        </button>
                    </form>

                    <div class="template-demo">
                        <a href="{{url('Admin/category/create')}}"><button type="button" class="btn btn-primary btn-fw" style="float: right;">Thêm danh mục</button></a>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th>Danh mục English </th>
                                <th>Danh mục Vietnamese </th>
                                <th>Trạng thái</th>
                                <th>Người tạo</th>
                                <th>Quản trị</th>

                            </tr>
                            </thead>

                            <tbody>
                            @if($category->total()>0)
                            @php($i = 1)
                            @foreach($category as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td width="20%">{{$row->nameC_en}}</td>
                                    <td>{{$row->nameV_vie}}</td>
                                    @if($row->status==1)
                                        <td ><span class="btn btn-success btn-sm" style="cursor: default">Hiển thị</span></td>
                                    @else
                                        <td ><span class="btn btn-danger btn-sm " style="cursor: default">Không hiển thị</span></td>
                                    @endif


                                    <td>{{$row->nguoitao}} <br> <small> @if($row->ngaysua!=null) đã sửa ngày  {{$row->ngaysua}} @else tạo ngày {{$row->datetime}}  @endif</small></td>
                                    <td>
                                       @if($row->nameC_en!="bot")
                                            <a href="{{route('category.edit',$row->id)}}" class="btn btn-info">Sửa</a>
                                            <a href="{{route('category.delete', $row->id)}}" onclick="return confirm('Bạn chắc chứ?')" class="btn btn-danger">Xóa</a>
                                        @endif
                                        <a href="{{route('category.danhmuccon', $row->id)}}" class="btn btn-primary">Danh mục con</a>
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
                        {{$category->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
@endsection
