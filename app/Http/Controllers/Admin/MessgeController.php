<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactResponseMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessgeController extends Controller
{
    public function index()
    {
        $data['messages'] = Message::all();
        return view("admin.messages.index")->with($data);
    }
    public function show($message)
    {
        $msg = Message::findOrFail($message);
        $data['message'] = $msg;

        return view("admin.messages.show")->with($data);
    }
    public function respond(Message $message, Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $Receivername = $message->receiverName;
        $receiverMail = $message->email;
        Mail::to($receiverMail)->send(new ContactResponseMail($Receivername, $request->title, $request->body));

        $request->session()->flash('msg', 'The Respond is sent successfully');
        return redirect(url("dashboard/messages"));
    }
}
