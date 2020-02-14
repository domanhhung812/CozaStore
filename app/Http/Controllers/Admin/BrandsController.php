<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brands;

class BrandsController extends Controller
{
    public function index(Request $request, Brands $brands)
    {
    	$data = [];
    	$data['brands'] = $brands->getAllDataBrands();
    	//dd($data);
    	return view('admin.brands.index_view',$data);
    }
    public function addBrands(Brands $brands)
    {
        $data = [];
        $data = $brands->getAllDataBrands();
        return view('admin.brands.add_view',$data);
    }
    public function handleAddBrands(Brands $brands, Request $request)
    {
        $this->validate($request,[
            'brand_name' => 'required',
            'address' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $dataInsert = new Brands;
        $dataInsert->brand_name = $request->post('brand_name');
        $dataInsert->address = $request->post('address');
        $dataInsert->status = $request->post('status');
        $dataInsert->description = $request->post('description');
        $dataInsert->save();
        return redirect()->route('admin.brands')->with('success','Data Added'); 
    }
    public function editBrands($id, Brands $brands)
    {
        $infoBrands = Brands::findOrFail($id);
        return view('admin.brands.edit_view',compact('infoBrands','id'));

    }
    public function handleEditBrands($id, Request $request, Brands $brands)
    {
        $this->validate($request,[
            'brand_name' => 'required',
            'address' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $infoBrands = Brands::find($id);
        $infoBrands->brand_name = $request->get('brand_name');
		$infoBrands->address = $request->get('address');
        $infoBrands->status = $request->get('status');
        $infoBrands->description = $request->get('description');
        $infoBrands->save();
        return redirect()->route('admin.brands')->with('success','Data Updated');       
    }
    public function deleteBrands(Request $request, Brands $brands)
    {
        if($request->ajax()){
            // dung la ajax gui len thi moi xu ly
            $id = $request->id;
            $del = $brands->deleteBrandsById($id);
            if($del){
               echo "OK"; 
            } else {
                echo "FAIL";
            }
        }
    }
}
