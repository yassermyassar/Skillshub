<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cat;
use Exception;

class CatController extends Controller
{
    public function index()
    {
        $data['cats'] = Cat::orderBy('id', 'DESC')->paginate(10);
        return view("admin.cats.index2")->with($data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|max:60|string',
            'name_ar' => 'required|max:60|string',
        ]);
        Cat::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
        ]);
        $request->session()->flash('msg', 'the Category is created successfully');
        return back();
    }
    public function update(Request $request)
    {

        $request->validate([
            'id' => 'required|max:50|exists:cats,id',
            'name_en' => 'required|max:60|string',
            'name_ar' => 'required|max:60|string',
        ]);
        Cat::findOrFail($request->id)->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
        ]);
        $request->session()->flash('msg', 'the Category is updated successfully');

        return back();
    }
    public function delete(Cat $cat, Request $request)
    {

        // Cat $cat       called route model binding

        try {
            $cat->delete();
            $msg = 'category deleted succesffully';
        } catch (Exception $e) {
            $msg =
                'failed to delete';
        }

        $request->session()->flash('msg', $msg);

        return back();
    }
    public function toggle(Cat $cat)
    {
        $cat->update([
            'active' => !$cat->active,
        ]);
        return back();
    }
}
