<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function allHospital(){
        $hospitals = Hospital::all();
        return view('admin.hospital.all_hospital', compact('hospitals'));
    }
    public function searchHospital(Request $request){
        // $request->validate([
        //     'search'=> 'required'
        // ]);
        $order = $request->search;
        $orders = null;
        if($order){
        $orders = Hospital::with('departments', 'doctors')
            ->where('name','LIKE',"%$order%")->limit(6)->get();
        }
        return $orders;
    }
    public function addHospital(Request $request){
        // dd($request->all());
        $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/hospital'), $filename);


         Hospital::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'address' => $request->address,
            'phoneNumber' => $request->name,
            'email' => $request->email,
            'image' => $filename,
            'latitude' => $request->lat,
            'longitude' => $request->lng,
            'state' => $request->state,
            'lga' => $request->lga,
        ]);
        $hospitals = Hospital::all();
        $message = 'Hospital saved successfully';
        return redirect()->route('hospital');
    }

    public function deleteHospital($id){
        Hospital::findOrFail($id)->delete();
        $hospitals = Hospital::all();
        $message = 'Hospital Deleted successfully';
        return redirect()->route('hospital');
    }
    public function editHospital($id){
        $hospital = Hospital::findOrFail($id);
        return view('admin.hospital.edit_hospital', compact('hospital'));
    }
    public function viewHospital($id){
        $hospital = Hospital::findOrFail($id);
        return view('admin.hospital.view_hospital', compact('hospital'));
    }
    public function updateHospital(Request $request,$id){
        $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/hospital'), $filename);

        $hospital = Hospital::findOrFail($id);
        $hospital->name =  $request->name;
        $hospital->address = $request->address;
        $hospital->phoneNumber = $request->phone;
        $hospital->email = $request->email;
        $hospital->image = $filename;
        $hospital->latitude = $request->lat;
        $hospital->longitude = $request->lng;
        $hospital->state = $request->state;
        $hospital->lga = $request->lga;
        $hospital->save();
        $hospitals = Hospital::all();
        $message = 'Hospital update successfully';
        return redirect()->route('hospital')->with($message);
    }

}