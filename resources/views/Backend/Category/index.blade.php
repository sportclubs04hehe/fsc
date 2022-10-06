@extends('Admin.admin_master')
@section('title','Categories Fsc')
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
                                <th>Quản trị</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($category as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->nameC_en}} </td>
                                    <td>{{$row->nameV_vie}}</td>
                                    @if($row->status==1)
                                        <td ><span class="btn btn-success btn-sm">Hiển thị</span></td>
                                    @else
                                        <td ><span class="btn btn-danger btn-sm ">Không hiển thị</span></td>
                                    @endif
                                    <td>
                                        <a href="{{route('category.edit',$row->id)}}" class="btn btn-info">Sửa</a>
                                        <a href="{{route('category.delete', $row->id)}}" onclick="return confirm('Bạn chắc chứ?')" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$category->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
@endsection
