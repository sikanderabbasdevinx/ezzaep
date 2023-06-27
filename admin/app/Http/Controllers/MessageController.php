<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocode;
use App\Models\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function message(Request $request)
    {
    	$messages = Message::all()->sortByDesc("created_at");
        return view('message.index',compact('messages'));
    }

    public function createMessage(Request $request)
    {
    	$message = new Message;
    	$message->message = $request->message;
        $message->title = $request->title;
    	$message->send_to = $request->send_to;
    	$message->save();
      	return back()->with('status','Message has been created successfully !');
    }

    public function deleteMessage($id)
    {
    	$data = Message::find($id)->delete();
      	return back()->with('status','Message has been deleted successfully !');

    }
}
