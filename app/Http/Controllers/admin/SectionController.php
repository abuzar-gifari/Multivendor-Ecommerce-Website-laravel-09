<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function sections(){
        $sections = Section::get()->toArray();
        return view('admin.sections.sections')->with(compact('sections'));
    }

    public function updateSectionStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status']=="Active") {
                $status=0;
            }else {
                $status=1;
            }
            Section::where('id',$data['section_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);
        }
    }
    
    public function DeleteSection($id){
        Section::where('id',$id)->delete();
        return redirect()->back()->with('success_msg','section deleted successfully');
    }
    
    public function addEditSection(Request $request,$id=null){
        if ($id=="") {
            $title = "Add Section";
            $section = new Section();
            $message = "Section Added Successfully";
        }else {
            $title = "Add Section";
            $section = Section::find($id);
            $message = "Section Updated Successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $section->name=$data['section_name'];
            $section->status=1;
            $section->save();

            return redirect()->back()->with('success_msg',$message);
        }

        return view('admin.sections.add_edit_section')->with(compact('title','section'));
    }
}
