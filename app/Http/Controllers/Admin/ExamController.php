<?php

namespace App\Http\Controllers\Admin;

use App\Events\newExamAdded;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Questions;
use App\Models\Skill;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Question\Question;

class ExamController extends Controller
{
    public function index()
    {
        $data['exams'] = Exam::orderBy('id', 'DESC')->paginate(10);
        // $data['cats'] = Cat::select('id', 'name')->get();
        return view("admin.exams.index")->with($data);
    }

    public function show(Exam $exam)
    {
        $data['exam'] = $exam;

        return view("admin.exams.show")->with($data);
    }
    public function showQues(Exam $exam)
    {
        $data['exam'] = $exam;
        return view("admin.exams.show-questions")->with($data);
    }
    public function create()
    {
        $data['skills'] = Skill::select('id', 'name')->get();
        return view("admin.exams.create")->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|max:60|string',
            'name_ar' => 'required|max:60|string',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'skill_id' => 'required|string|exists:skills,id',
            'img' => 'required|image',
            'question_no' => 'required|min:1|integer',
            'difficulty' => 'required|min:1|max:5|integer',
            'duration' => 'required|integer|min:1',


        ]);

        $imagePath = Storage::disk("uploads")->put("exams", $request->file('img'));




        $exam = Exam::create([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'desc' => json_encode([
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,
            ]),
            'skill_id' => $request->skill_id,
            'img' => $imagePath,
            'question_no' => $request->question_no,
            'difficulty' => $request->difficulty,
            'duration_mins' => $request->duration,
            'active' => 0,

        ]);
        $request->session()->flash('prev', "exam/$exam->id");
        return redirect(url("dashboard/exams/{$exam->id}/questions/create"));
    }
    public function CreateQues(Exam $exam)
    {
        if (session('prev') !== "exam/$exam->id") {
            return redirect(url("dashboard"));
        }
        $data['exam_id'] = $exam->id;
        $data['question_no'] = $exam->question_no;

        return view("admin.exams.create-questions")->with($data);
    }
    public function StoreQues(Exam $exam, Request $request)
    {
        $request->session()->flash('current', "exam/$exam->id");

        $request->validate([
            'titles' => 'required|array',
            'titles.*' => 'required|string',
            'right_anss' => 'required|array',
            'right_anss.*' => 'required|in:1,2,3,4|string',


            'option_1s.*' => 'required|string',
            'option_1s' => 'required|array',
            'option_2s.*' => 'required|string',
            'option_2s' => 'required|array',
            'option_3s' => 'required|array',
            'option_3s.*' => 'required|string',
            'option_4s.*' => 'required|string',
            'option_4s' => 'required|array',
        ]);

        for ($i = 0; $i < $exam->question_no; $i++) {
            Questions::create([
                'exam_id' => $exam->id,
                'title' => $request->titles[$i],
                'right_ans' => $request->right_anss[$i],
                'option_1' => $request->option_1s[$i],
                'option_2' => $request->option_2s[$i],
                'option_3' => $request->option_3s[$i],
                'option_4' => $request->option_4s[$i],
            ]);
        }
        $exam->update([
            'active' => 1,
        ]);
        event(new newExamAdded);
        return redirect(url("dashboard/exams"));
    }

    public function edit(Exam $exam)
    {
        $data['exam'] = $exam;
        $data['skills'] = Skill::select('id', 'name')->get();

        return view("admin.exams.edit")->with($data);
    }
    public function editQuestion(Exam $exam, Questions $question)
    {
        $data['exam'] = $exam;
        $data['question'] = $question;

        return view("admin.exams.edit-question")->with($data);
    }
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'name_en' => 'required|max:60|string',
            'name_ar' => 'required|max:60|string',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'skill_id' => 'required|string|exists:skills,id',
            'img' => 'nullable|image',
            'difficulty' => 'required|min:1|max:5|integer',
            'duration' => 'required|integer|min:1',


        ]);

        $imagePath = $exam->img;
        if ($request->hasFile('img')) {
            Storage::disk("uploads")->delete($imagePath);
            $imagePath = Storage::disk("uploads")->put("exams", $request->file('img'));
        }

        $exam->update([
            'name' => json_encode([
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ]),
            'desc' => json_encode([
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,
            ]),
            'skill_id' => $request->skill_id,
            'img' => $imagePath,

            'difficulty' => $request->difficulty,
            'duration_mins' => $request->duration,
            'active' => 0,

        ]);
        $request->session()->flash('msg', "exam/$exam->id");
        return redirect(url("dashboard/exams"));
    }


    public function updateQuestion(Exam $exam, Questions $question, Request $request)
    {
        $request->validate([
            'title' => 'required|string',


            'right_ans' => 'required|string',



            'option_1' => 'required|string',
            'option_2' => 'required|string',

            'option_3' => 'required|string',

            'option_4' => 'required|string',
        ]);

        for ($i = 0; $i < $exam->question_no; $i++) {
            $question->update([
                'exam_id' => $exam->id,
                'title' => $request->title,
                'right_ans' => $request->right_ans,
                'option_1' => $request->option_1,
                'option_2' => $request->option_2,
                'option_3' => $request->option_3,
                'option_4' => $request->option_4,
            ]);
        }
        $question->update([
            'active' => 1,
        ]);
        return redirect(url("dashboard/exams/show/$exam->id"));
    }


    public function delete(Exam $exam,  Request $request)
    {

        // Cat $cat       called route model binding

        try {
            $exam->questions()->delete();
            $exam->delete();
            Storage::disk('uploads')->delete($exam->img);
            $msg = 'row deleted succesffully';
        } catch (Exception $e) {
            $msg =
                'failed to delete';
        }

        $request->session()->flash('msg', $msg);

        return back();
    }


    public function toggle(Exam $exam)
    {
        if ($exam->question_no == $exam->questions()->count()) {
            $exam->update([
                'active' => !$exam->active,
            ]);
        }
        return back();
    }
}
