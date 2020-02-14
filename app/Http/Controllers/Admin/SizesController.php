<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sizes;

class SizesController extends Controller
{
    public function index(Request $request, Sizes $sizes)
    {
    	$data = [];
    	$data['sizes'] = $sizes->getAllDataSizes();
    	return view('admin.sizes.index_view',$data);
    }
    public function addSizes(Sizes $sizes)
    {
        $data = [];
        $data = $sizes->getAllDataSizes();
        return view('admin.sizes.add_view',$data);
    }
    public function handleAddSizes(Sizes $sizes, Request $request)
    {
        $this->validate($request,[
            'letter_size' => 'required',
            'number_size' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $dataInsert = new Sizes;
        $dataInsert->letter_size = $request->post('letter_size');
        $dataInsert->number_size = $request->post('number_size');
        $dataInsert->status = $request->post('status');
        $dataInsert->description = $request->post('description');
        $dataInsert->save();
        return redirect()->route('admin.sizes')->with('success','Data Added'); 
    }
    public function editSizes($id, Sizes $sizes)
    {
        $infoSizes = Sizes::findOrFail($id);
        return view('admin.sizes.edit_view',compact('infoSizes','id'));

    }
    public function handleEditSizes($id, Request $request, Sizes $sizes)
    {
        $this->validate($request,[
            'letter_size' => 'required',
            'number_size' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $infoSizes = Sizes::find($id);
        $infoSizes->letter_size = $request->get('letter_size');
        $infoSizes->number_size = $request->get('number_size');
        $infoSizes->status = $request->get('status');
        $infoSizes->description = $request->get('description');
        $infoSizes->save();
        return redirect()->route('admin.sizes')->with('success','Data Updated');       
    }
    public function deleteSizes(Request $request, Sizes $sizes)
    {
        if($request->ajax()){
            // dung la ajax gui len thi moi xu ly
            $id = $request->id;
            $del = $sizes->deleteSizesById($id);
            if($del){
               echo "OK"; 
            } else {
                echo "FAIL";
            }
        }
    }
}
