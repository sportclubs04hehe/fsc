<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
        $category= DB::table('categories')->where('nameC_en','like',"%{$keyword}%")->orWhere('nameV_vie','like',"%{$keyword}%")->orderBy('id','desc')->paginate(5);
        return view('Backend.Category.index', compact('category'));
    }

    function create(){
        return view('Backend.Category.create');
    }

    function store(Request $request){
        $request->validate([
           'nameC_en'=>'required|max:255|unique:categories|regex:/^(?!(.*\d){5})[A-Za-z_@.#&+-_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ,.!?\d]+$/',
           'nameV_vie'=>'required|max:255|unique:categories|regex:/^(?!(.*\d){5})[A-Za-z_@.#&+-_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ,.!?\d]+$/',
//            'status'=>'accepted',
        ],[
            'required'=>'Trường :attribute không được để trống',
            'unique'=>'Tên danh mục :attribute đã tồn tại',
            'regex'=> 'Kí tự số không được tồn tại quá 4 lần trong trường'

        ],[
            'nameC_en'=>'Danh Mục English',
            'nameV_vie'=>'Danh Mục Vietnamese',
        ]);
        $time= Carbon::now('Asia/Ho_Chi_Minh');
        $data= array();
        $data['nameC_en']= $request->nameC_en;
        $data['nameV_vie']= $request->nameV_vie;
        $data['status']= $request->status;
        $data['datetime']= $time->toDateTimeString();
        $data['nguoitao']= Auth::user()->name;

        Categorie::create($data);
        $notification = array(
            'message' => 'Tạo danh mục thành công',
            'alert-type' => 'success'
        );


        return redirect('Admin/category/index')->with($notification);
    }

    function edit($id){
        $category= Categorie::find($id);
        return view('Backend.Category.edit',compact('category'));
    }

    function update(Request $request,$id){
        $request->validate([
            'nameC_en'=>'required|max:255|regex:/^(?!(.*\d){5})[A-Za-z_@.#&+-_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ,.!?\d]+$/',
            'nameV_vie'=>'required|max:255|regex:/^(?!(.*\d){5})[A-Za-z_@.#&+-_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ,.!?\d]+$/',
//            'status'=>'accepted',
        ],[
            'required'=>'Trường :attribute này không được để trống',
            'unique'=>'Tên danh mục :attribute đã tồn tại',
            'regex'=> 'Kí tự số không được tồn tại quá 4 lần trong trường'
        ],[
            'nameC_en'=>'Danh Mục English',
            'nameV_vie'=>'Danh Mục Vietnamese',
        ]);

        $time= Carbon::now('Asia/Ho_Chi_Minh');
        $data= array();
        $data['nameC_en']= $request->nameC_en;
        $data['nameV_vie']= $request->nameV_vie;
        $data['ngaysua']= $time->toDateTimeString();
        $data['status']= $request->status;

        Categorie::where('id',$id)->update($data);

        $notification = array(
            'message' => 'Sửa danh mục thành công',
            'alert-type' => 'success'
        );

        return redirect('Admin/category/index')->with($notification);
    }

    function delete($id){
        $category= Categorie::findOrFail($id);

        $subcategory= $category->danhmuccon;

        if(isset($subcategory)){
            $bot= DB::table('categories')->where('nameC_en','=','bot')->get()->first();
            foreach ($subcategory as $sub){
                $sub->categorie_id  = $bot->id;
                $sub->save();
            }
            $category->delete();
        }

        $notification = array(
            'message' => 'Xóa danh mục thành công!',
            'alert-type' => 'error'
        );

        return redirect('Admin/category/index')->with($notification);
    }


}
