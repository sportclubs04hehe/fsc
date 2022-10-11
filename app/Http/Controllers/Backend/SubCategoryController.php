<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    //
    function index(Request $request){


        $time= Carbon::now('Asia/Ho_Chi_Minh');
//        return $time->format('l jS \\of F Y h:i:s A');
//        return $time->toFormattedDateString();
//        return $time->toDayDateTimeString();
//        return $time->toDateTimeString();
        $keyword="";

//        return $request->input();

        if ($request->input('keyword')!= null){
            $keyword= $request->input('keyword');
        }
        $subcategory= DB::table('subcategory')->where('subC_en','like',"%{$keyword}%")->orWhere('subV_vie','like',"%{$keyword}%")->orderBy('id','desc')->paginate(5);
        return view('Backend.SubCategory.index', compact('subcategory'));
    }

    function create(){
        $category= Categorie::all();
        return view('Backend.SubCategory.create',compact('category'));
    }

    function store(Request $request){
        $request->validate([

            'subC_en'=>"required|max:255|unique:subcategory|regex:/^(?!(.*\d){5})[A-Za-z_@.#&+-_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ,.!?\d]+$/",
            'subV_vie'=>"required|max:255|unique:subcategory|regex:/^(?!(.*\d){5})[A-Za-z_@.#&+-_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ,.!?\d]+$/",
            'categorie_id'=> 'required|not_in:0',
        ],[

            'required'=>'Trường :attribute không được để trống',
            'unique'=>'Tên danh mục :attribute đã tồn tại',
            'not_in'=>'Vui lòng chọn 1 danh mục cha',
            'regex'=> 'Kí tự số không được tồn tại quá 4 lần trong trường'

        ],[
            'subC_en'=>'Danh Mục Con English',
            'subV_vie'=>'Danh Mục Con Vietnamese',
            'categorie_id'=>'Danh mục cha'
        ]);
        $time= Carbon::now('Asia/Ho_Chi_Minh');
        $data= array();
        $data['subC_en']= $request->subC_en;
        $data['subV_vie']= $request->subV_vie;
        $data['nguoitao']= Auth::user()->name;
        $data['datetime']= $time->toDateTimeString();
        $data['status']= $request->input('status');
        $data['categorie_id']= $request->categorie_id;


        SubCategory::create($data);
        $notification = array(
            'message' => 'Tạo danh mục thành công',
            'alert-type' => 'success'
        );


        return redirect('Admin/subcategory/index')->with($notification);

    }

    function edit($id){
        $category= Categorie::all();
        $subCategory= SubCategory::find($id);
        return view('Backend.SubCategory.edit',compact('category','subCategory'));
    }

    function update(Request $request,$id){
        $request->validate([

            'subC_en'=>'required|max:255|regex:/^(?!(.*\d){5})[A-Za-z_@.#&+-_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ,.!?\d]+$/',
            'subV_vie'=>'required|max:255|regex:/^(?!(.*\d){5})[A-Za-z_@.#&+-_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ,.!?\d]+$/',
            'categorie_id'=> 'required|not_in:0',
        ],[

            'required'=>'Trường :attribute không được để trống',
            'unique'=>'Tên danh mục :attribute đã tồn tại',
            'not_in'=>'Vui lòng chọn 1 danh mục cha',
            'regex'=> 'Kí tự số không được tồn tại quá 4 lần trong trường'
        ],[
            'subC_en'=>'Danh Mục Con English',
            'subV_vie'=>'Danh Mục Con Vietnamese',
            'categorie_id'=>'Danh mục cha'
        ]);

        $time= Carbon::now('Asia/Ho_Chi_Minh');
        $data= array();
        $data['subC_en']= $request->subC_en;
        $data['subV_vie']= $request->subV_vie;
        $data['nguoitao']= Auth::user()->name;
        $data['ngaysua']= $time->toDateTimeString();
        $data['status']= $request->input('status');
        $data['categorie_id']= $request->categorie_id;

        SubCategory::where('id',$id)->update($data);

        $notification = array(
            'message' => 'Sửa danh mục thành công',
            'alert-type' => 'success'
        );

        return redirect('Admin/subcategory/index')->with($notification);
    }

    function delete($id){
        $category= SubCategory::findOrFail($id);
        $category->delete();

        $notification = array(
            'message' => 'Xóa danh mục thành công!',
            'alert-type' => 'error'
        );

        return redirect('Admin/subcategory/index')->with($notification);
    }
}
