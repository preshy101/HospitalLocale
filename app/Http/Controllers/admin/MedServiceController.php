<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedService;
use App\Models\Hospital;

class MedServiceController extends Controller
{
   public function allMed(){
     $meds = MedService::all();
      $hospitals = Hospital::all();
     return view('admin.med-service.all_med', compact('meds','hospitals'));
   }
   public function addMedService(Request $request){

     $meds = MedService::create([
        'hospital_id' => $request->hospital_id,
        'icon' => $request->icon,
        'name' => $request->name,
        'description' => $request->description,
     ]);
     $meds = MedService::all();
      $hospitals = Hospital::all();
 return view('admin.med-service.all_med', compact('meds','hospitals'));
   }
}