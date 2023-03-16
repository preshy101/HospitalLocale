<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Department;

class DepartmentController extends Controller
{
   public function allDepartments()
   {
        $hospitals = Hospital::all();
        $departments = Department::all();
        return view('admin.department.all_department', compact('hospitals', 'departments'));
    }
   public function addDepartment(Request $request)
   {
        $departments = Department::all();
         $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/department'), $filename);


         Department::create([
            'name' => $request->name,
            'hospital_id' => $request->hospital_id,
            'shortDescription' => $request->shortD,
            'image' => $filename,
            'longDescription' => $request->longD,

        ]);
        $hospitals = Hospital::all();
      return redirect()->route('departments');
    }

    public function deleteDepartment($id)
    {
        Department::findOrFail($id)->delete();
        return redirect()->route('departments');
    }
   public function editDepartment($id){
            $hospitals = Hospital::all();
        $department = Department::findOrFail($id);
      return view('admin.department.edit_department', compact('hospitals', 'department'));
    }
   public function updateDepartment(Request $request, $id){
        $department = Department::findOrFail($id);
          $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/department'), $filename);

        $department->name =  $request->name;
        $department->image =  $filename;
        $department->shortDescription =  $request->longD;
        $department->longDescription =  $request->longD;
        $department->save();

        return redirect()->route('departments');
  }
  public function viewDepartment($id){
    $department = Department::findOrFail($id);
    $hospital = Hospital::findOrFail($department->hospital_id);
     return view('admin.hospital.view_hospital', compact('hospital','department'));
  }
}