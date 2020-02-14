<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Colors;

class ColorsController extends Controller
{
    public function index(Request $request, Colors $colors)
    {
    	$data = [];
    	$data['colors'] = $colors->getAllDataColors();
    	//dd($data);
    	return view('admin.colors.index_view',$data);
    }
    public function addColors(Colors $colors)
    {
        $data = [];
        $data = $colors->getAllDataColors();
        return view('admin.colors.add_view',$data);
    }
    public function handleAddColors(Colors $colors, Request $request)
    {
        $this->validate($request,[
            'name_color' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $dataInsert = new Colors;
        $dataInsert->name_color = $request->post('name_color');
        $dataInsert->status = $request->post('status');
        $dataInsert->description = $request->post('description');
        $dataInsert->save();
        return redirect()->route('admin.colors')->with('success','Data Added'); 
    }
    public function editColors($id, Colors $colors)
    {
        $infoColors = Colors::findOrFail($id);
        return view('admin.colors.edit_view',compact('infoColors','id'));

    }
    public function handleEditColors($id, Request $request, Colors $colors)
    {
        $this->validate($request,[
            'name_color' => 'required',
            'status' => 'required',
            'description' => 'required'
        ]);
        $infoColors = Colors::find($id);
        $infoColors->name_color = $request->get('name_color');
        $infoColors->status = $request->get('status');
        $infoColors->description = $request->get('description');
        $infoColors->save();
        return redirect()->route('admin.colors')->with('success','Data Updated');       
    }
    public function deleteColors(Request $request, Colors $colors)
    {
        if($request->ajax()){
            // dung la ajax gui len thi moi xu ly
            $id = $request->id;
            $del = $colors->deleteColorsById($id);
            if($del){
               echo "OK"; 
            } else {
                echo "FAIL";
            }
        }
    }
}
