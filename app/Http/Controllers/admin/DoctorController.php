<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctors;
use App\Models\Hospital;
use App\Models\Department;


class DoctorController extends Controller
{
    public function allDoctor(){
        $doctors = Doctors::all();
        $hospitals = Hospital::all();
        return view('admin.doctor.all_doctor', compact('doctors','hospitals'));
    }
    public function addDoctor(Request $request){
         $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/doctor'), $filename);

        Doctors::create([
            'hospital_id' => $request->hospital_id,
            'image' => $filename,
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->shortD,
            'socialLink1' => $request->socialLink1,
            'socialLink2' => $request->socialLink2,
            'socialLink3' => $request->socialLink3,
            'socialLink4' => $request->socialLink4,
        ]);
        return redirect()->route('doctor');
    }
    public function editDoctor($id){
        $doctor = Doctors::findOrFail($id);
        $hospitals = Hospital::all();
        return view('admin.doctor.edit_doctor', compact('doctor','hospitals'));
    }
    public function updateDoctor(Request $request, $id){
        $doctor = Doctors::findOrFail($id);
          $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/doctor'), $filename);

            $doctor->hospital_id = $request->hospital_id;
            $doctor->image = $filename;
            $doctor->name = $request->name;
            $doctor->title = $request->title;
            $doctor->description = $request->shortD;
            $doctor->socialLink1 = $request->socialLink1;
            $doctor->socialLink2 = $request->socialLink2;
            $doctor->socialLink3 = $request->socialLink3;
            $doctor->socialLink4 = $request->socialLink4;
            $doctor->save();
        return redirect()->route('doctor');
    }
    public function deleteDoctor($id){
         $department = Doctors::findOrFail($id)->delete();
        return redirect()->route('doctor');
    }
    public function viewDoctor($id){
    $doctor = Doctors::findOrFail($id);
    $department = Department::where('hospital_id',$doctor->hospital_id)->first();
    $hospital = Hospital::findOrFail($doctor->hospital_id);
     return view('admin.hospital.view_hospital', compact('hospital','doctor','department'));
  }
}