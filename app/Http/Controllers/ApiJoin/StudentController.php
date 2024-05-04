<?php

namespace App\Http\Controllers\ApiJoin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Student_Add;
use App\Models\Student\Student_Name;

class StudentController extends Controller
{
    public function saving(Request $request){
        
        $request->validate([
            'mobile' => 'required|min:10',
            'name' => 'required',
            'address' => 'required'
        ]);

        $insertdata1 = ([
            "mobile_no" => $request->input('mobile'),
            "name" => $request->input('name')
        ]);

        Student_Name::insert($insertdata1);
        
        $insertdata2 = ([
            "mobile_no" => $request->input('mobile'),
            "address" => $request->input('address')
        ]);

        Student_Add::insert($insertdata2);

        return response()->json(["success"=>true]);
    }

    public function show(){
        $dt = Student_Name::with('addressJoin')->get();
        
        return response()->json(["success"=>true, "data"=>$dt]);
    }
}
