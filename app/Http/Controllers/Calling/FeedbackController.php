<?php

namespace App\Http\Controllers\Calling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Calling\CallingFeedback;

class FeedbackController extends Controller
{
    // open and load feedback page

    public function feedBack(Request $request){
        $feedback = CallingFeedback::get();
        return view('calling.feedback',compact('feedback'));
    }

    // submit feedback

    public function submitFeedBack(Request $request){
        $feedbackname = $request->input('feedbackName');
        $insertfeedback=[
            'f_name'=>$feedbackname
        ];
        CallingFeedback::insert($insertfeedback);
        return redirect()->back()->with('success','Successfully Added');
    }

    // edit feedback

    public function editFeedBack($id){
        $feedback = CallingFeedback::where('f_id',$id)->get();
        return redirect()->back()->with();
    }

    // delete feedback

    public function deleteFeedBack($id){
        $deletefeedback = CallingFeedback::where('f_id',$id);
        $deletefeedback->delete();
        return redirect()->back()->with('success','Successfully Delete');
    }
}
