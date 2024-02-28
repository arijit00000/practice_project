<?php

namespace App\Http\Controllers\Calling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use App\models\Calling\CallingData;

class callingController extends Controller
{
    // open page
    public function openPage(Request $request){
        // $callinglist = User::get();
        return view('calling.call');
    }

    // load and show data
    public function loadData(Request $request){
        $callingdata = CallingData::get();
        return response()->json(['success'=>true, 'data'=>$callingdata->toArray()]);
    }

    //submit data
    public function submitData(Request $request){

        $request->validate(['patientmobile'=>'required|numeric|max:99999999999|min:100000000']);

        $patient_id = $request->input('patientid');
        $patient_name = $request->input('patientname');
        $patient_number = $request->input('patientmobile');
        $appoint_date = $request->input('appointmentdate');
        $comment = $request->input('comment');
        $notifyDate = $request->input('notifyDate');

        if(empty($patient_id)){
                $insertData = [
                "patient_name" => $patient_name,
                "patient_number" => $patient_number,
                "appoint_date" => $appoint_date,
                "comment" => $comment,
                "notification_date" => $notifyDate
            ];
            CallingData::insert($insertData);
        }
        else{
            $insertData = [
                "patient_name" => $patient_name,
                "patient_number" => $patient_number,
                "appoint_date" => $appoint_date,
                "comment" => $comment,
                "notification_date" => $notifyDate
            ];
            CallingData::where('id','=',$patient_id)->update($insertData);
        }
        return response()->json(['success'=>true]);
    }

    //edit fill data
    public function editFillData(Request $request){
        $callingdata = CallingData::where('id',$request->id)->first();
        return response()->json(['success'=>true, 'data'=>$callingdata->toArray()]);
    }

    //delete data
    public function deleteData(Request $request){
        $deleteList = CallingData::where('id',$request->id);
        $deleteList->delete();
        return response()->json(['success'=>true]);
    }

    //card number
    public function card(Request $request){
        $countdata = CallingData::get()->count();
        return response()->json(['success'=>true, 'countdata'=>$countdata]);
    }
}
