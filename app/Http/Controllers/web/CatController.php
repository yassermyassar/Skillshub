<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cat;
use App\Models\Skill;

class CatController extends Controller
{
    public function show($id)
    {
        $data['cat'] = cat::findOrFail($id);
        $data['allCats'] = cat::select('id', 'name')->active()->get();
        $data['skills'] = $data['cat']->skills()->active()->paginate(6);
        return view('web.cats.show')->with($data);
    }
}
