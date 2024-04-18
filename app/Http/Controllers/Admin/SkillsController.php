<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class SkillsController extends Controller
{
    public function index()
    {
        $data['skills'] = Skill::orderBy('id', 'DESC')->paginate(10);
        $data['cats'] = Cat::select('id', 'name')->get();
        return view("admin.skills.index")->with($data);
    }
    public function store(Request $request)
    {


        $request->validate([
            'name_en' => 'required|max:60|string',
            'name_ar' => 'required|max:60|string',
            'cat_id' => 'required|string|exists:cats,id',
            'img' => 'required|image',


        ]);

        $imagePath = Storage::putFile("skills", $request->file('img'));
        $imagePath =
            Storage::disk('uploads')->put('skills', $request->file('img'));



        Skill::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'cat_id' => $request->cat_id,
            'img' => $imagePath,
        ]);
        $request->session()->flash('msg', 'the Skill is created successfully');
        return back();
    }


    public function update(Request $request)
    {

        // $request->validate([
        //     'id' => 'required|exists:skills,id',
        //     'name_en' => 'required|max:60|string',
        //     'name_en' => 'required|max:60|string',

        //     'cat_id' => 'required|string|exists:cats,id',


        // ]);

        $skill = Skill::findOrFail($request->id);
        $imagePath = $skill->img;
        if ($request->hasFile('img')) {
            Storage::disk("uploads")->delete($imagePath);
            $imagePath = Storage::disk("uploads")->put("skills", $request->file('img'));
        }




        $skill->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'cat_id' => $request->cat_id,
            'img' => $imagePath,

        ]);
        $request->session()->flash('msg', 'the Category is updated successfully');

        return back();
    }




    public function delete(Skill $skill, Request $request)
    {

        // Cat $cat       called route model binding

        try {
            $skill->delete();
            Storage::disk('uploads')->delete($skill->img);
            $msg = 'skill deleted succesffully';
        } catch (Exception $e) {
            $msg =
                'failed to delete';
        }

        $request->session()->flash('msg', $msg);

        return back();
    }
    public function toggle(Skill $skill)
    {
        $skill->update([
            'active' => !$skill->active,
        ]);
        return back();
    }
}
