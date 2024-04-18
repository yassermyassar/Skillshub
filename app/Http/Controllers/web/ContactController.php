<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $data['sett'] = Settings::select('email', 'phone')->first();
        return view('web.contact.index')->with(($data));
    }
    public function send(Request $request)
    {
        // في حالة ارسال البيانات بالطريقة المعتادة
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:255|string',
            'email' => 'required|email|max:255',
            'body' => 'required|max:255',
            'subject' => 'nullable',
        ]);
        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            return redirect(url('/contact'))->withErrors($errors);
        }
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body,
            'subject' => $request->subject,
        ]);
        $request->session()->put('success', 'message send successfully');
        return back();
        // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
        // ارسال البيانات بالاجاكس
        // $request->validate([
        //     'name' => 'required|max:255|string',
        //     'email' => 'required|email|max:255',
        //     'body' => 'required|max:255',
        //     'subject' => 'nullable',
        // ]);

        // Message::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'body' => $request->body,
        //     'subject' => $request->subject,
        // ]);
        // $data = ['success' =>  'message send successfully'];
        // return Response::json($data);
    }
}
