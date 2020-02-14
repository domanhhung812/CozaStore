<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class CategoriesController extends Controller
{
    //
    public function index(Request $request, Categories $cat)
    {
    	$data = [];
    	$data['cat'] = $cat->getAllDataCategories();
    	//dd($data);
    	return view('admin.categories.index_view',$data);
    }
    public function deleteCategories(Request $request, Categories $cat)
    {
        if($request->ajax()){
            // dung la ajax gui len thi moi xu ly
            $id = $request->id;
            $del = $cat->deleteCategoryById($id);
            if($del){
               echo "OK"; 
            } else {
                echo "FAIL";
            }
        }
    }

    public function editCategories($id, Categories $cat)
    {
        $infoCat = Categories::findOrFail($id);
        return view('admin.categories.edit_view',compact('infoCat','id'));

    }
    public function handleEditCategories($id, Request $request, Categories $cat)
    {
        $this->validate($request,[
            'name' => 'required',
            'parent_id' => 'required',
            'status' => 'required'
        ]);
        $infoCat = Categories::find($id);
        $infoCat->name = $request->get('name');
        $infoCat->parent_id = $request->get('parent_id');
        $infoCat->status = $request->get('status');
        $infoCat->save();
        return redirect()->route('admin.categories')->with('success','Data Updated');       
    }
    public function addCategories(Categories $cat)
    {
        $data = [];
        $data = $cat->getAllDataCategories();
        return view('admin.categories.add_view',$data);
    }
    public function handleAddCategories(Categories $cat, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'parent_id' => 'required',
            'status' => 'required'
        ]);
        $dataInsert = new Categories;
        $dataInsert->name = $request->post('name');
        $dataInsert->parent_id = $request->post('parent_id');
        $dataInsert->status = $request->post('status');
        $dataInsert->save();
        return redirect()->route('admin.categories')->with('success','Data Added'); 
    }
}