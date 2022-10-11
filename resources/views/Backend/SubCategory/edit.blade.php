@extends('Admin.admin_master')
@section('title','Sửa danh mục con')

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
                                <h4 class="mb-1 mb-sm-0">Chào mừng đến hệ thống quản lí của FSC</h4>

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



        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sửa danh mục con</h4>

                    <form class="forms-sample" method="POST" action="{{route('subcategory.update', $subCategory->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="subC_en">Danh mục con English <b style="color: red">*</b></label>
                            <input type="text" class="form-control" name="subC_en" id="subC_en" value="{{$subCategory->subC_en}}"  placeholder="Danh mục con English">
                            @error('subC_en')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subV_vie">Danh mục con Vietnamese <b style="color: red">*</b></label>
                            <input type="text" class="form-control" name="subV_vie" id="subV_vie" value="{{$subCategory->subV_vie}}"  placeholder="Danh mục con Vietnamese">
                            @error('subV_vie')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Danh mục cha <b style="color: red">*</b></label>
                            <select id="category_id" class="form-control" name="category_id">
                                <option selected="selected" value="0">Chọn</option>
                                @foreach($category as $categories)
                                    <option value="{{$categories->id}}" id="category_id" @if($categories->id==$subCategory->category_id) selected="selected" @endif>{{$categories->nameC_en}} | {{$categories->nameV_vie}}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input style="width: 18px; height: 18px" class="form-check-input " name="status" type="checkbox"  @if($subCategory->status==1) checked @endif value="1" id="status">
                            <label class="form-check-label text-white" style="position: absolute; margin-top: 5px" for="status">
                                Trạng thái hiển thị <small class="text-muted">(Vui lòng chọn nếu anh/chị muốn danh mục hiển thị lên menu)</small>
                            </label>
                        </div>
                        <a href="{{url('Admin/subcategory/index')}}" class="btn btn-danger mr-2 mt-3" onclick="return confirm('Bạn chắc chứ? Mọi thay đổi của bạn sẽ không được lưu lại!')"><i class="fa-solid fa-backward-step"></i> Trở lại</a>
                        <button type="submit" class="btn btn-primary mr-2 mt-3">Cập nhật</button>

                    </form>
@endsection
