<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    function index(){
        $category= Categorie::paginate(5);
        return view('Backend.Category.index', compact('category'));
    }

    function create(){
        return view('Backend.Category.create');
    }

    function store(Request $request){
        $request->validate([
           'nameC_en'=>'required|max:255|unique:categories',
           'nameV_vie'=>'required|max:255|unique:categories',
//            'status'=>'accepted',
        ],[
            'required'=>'Trường này không được để trống',
            'unique'=>'Tên danh mục đã tồn tại',

        ],[
            'nameC_en'=>'Danh Mục English',
            'nameV_vie'=>'Danh Mục Vietnamese',
        ]);

        $data= array();
        $data['nameC_en']= $request->nameC_en;
        $data['nameV_vie']= $request->nameV_vie;
        $data['status']= $request->status;

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
            'nameC_en'=>'required|max:255|unique:categories',
            'nameV_vie'=>'required|max:255|unique:categories',
//            'status'=>'accepted',
        ],[
            'required'=>'Trường này không được để trống',
            'unique'=>'Tên danh mục đã tồn tại',
        ],[
            'nameC_en'=>'Danh Mục English',
            'nameV_vie'=>'Danh Mục Vietnamese',
        ]);

        $data= array();
        $data['nameC_en']= $request->nameC_en;
        $data['nameV_vie']= $request->nameV_vie;
        $data['status']= $request->status;

        Categorie::where('id',$id)->update($data);

        $notification = array(
            'message' => 'Sửa danh mục thành công',
            'alert-type' => 'success'
        );

        return redirect('Admin/category/index')->with($notification);
    }

    function delete($id){
        $category= Categorie::find($id);
        if($category){
            $category->delete();
        }else{
            abort(403);
        }

        $notification = array(
            'message' => 'Xóa danh mục thành công!',
            'alert-type' => 'error'
        );

        return redirect('Admin/category/index')->with($notification);
    }
}
