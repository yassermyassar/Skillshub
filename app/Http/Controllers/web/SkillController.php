<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\cat;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function show($id)
    {
        $skill = Skill::findOrFail($id);
        $cat = Cat::where('id', $skill->cat_id)->first();

        $data['skill'] = Skill::findOrFail($id);

        return view('web.skills.show')->with($data);
    }
}
