<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Exam;

class homeController extends Controller
{
    public function index()
    {
        $data['exams'] = Exam::select('*')->orderBy('id', 'DESC')->paginate(4);
        $data['skills'] = Skill::select('*')->orderBy('id', 'DESC')->paginate(4);

        return view('web.home.index')->with($data);
    }
}
