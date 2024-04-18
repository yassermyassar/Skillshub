<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function show($id)
    {
        $data['exam'] = Exam::findOrFail($id);

        $data['canViewStartButton'] = true;
        $user = Auth::user();
        if ($user !== null) {

            $pivotRow = $user->exams()->where('exam_id', $id)->first();
            // بقوله هات من جدول البيفوت الاي دي اللي بيساوي اي دي الامتحان 
            if ($pivotRow !== null and $pivotRow->pivot->status == 'closed') {
                $data['canViewStartButton'] = false;
                //بشوف لو كان الصف تبع اليوزر و الامتحان موجود يبقى الطالب دخل الامتحان قبل كدا و ان حالة الامتحان كلوزد و مينفعش يدخله تاني
            }
        }

        return view('web.exams.show')->with($data);
    }

    public function start($exam_id, Request $request)
    {
        $user = Auth::user();
        $user->exams()->attach($exam_id);

        if (!$user->exams->contains($exam_id)) {
        } else {
            $user->exams()->updateExistingPivot($exam_id, [
                'status' => 'closed',
            ]);
        }


        $request->session()->flash("prevPage", "start/$exam_id");
        // بعمل سيشن عشان يكون فيه تسلسل للصفحات بحيث ميقدرش يدخل الامتحان غير من خلال زارار بدأ امتحان 
        return redirect(url("exams/questions/$exam_id"));
    }
    public function questions($exam_id, Request $request)
    {
        if (session('prevPage') !== "start/$exam_id") {
            // لو الطالب داخل الاسئلة من خلال الزارار ف يدخله عادي لكن لو غير الزارار ف يرجعه برا تاني
            return redirect(url("exam/show/$exam_id"));
        }
        $data['exam'] = Exam::findOrFail($exam_id);
        $request->session()->flash("prevPage", "questions/$exam_id");

        return view('web.exams.questions')->with($data);
    }

    public function submitt(Request $request, $exam_id)
    {

        // $request->validate([
        //     'answer' => 'required|array',
        //     'answer.*' => 'required|in:1,2, 3,4',
        // ]);
        $exam = Exam::findOrFail($exam_id);

        $totalQues = $exam->questions->count();
        $points = 0;
        foreach ($exam->questions as $question) {
            if (isset($request->answer[$question->id])) {

                $userAns = $request->answer[$question->id];


                $rightAns = $question->right_ans;
                if ($userAns == $rightAns) {
                    $points += 1;
                }
            }
        }
        $score = ($points / $totalQues) * 100;

        // //calculate duration_mins
        $user = Auth::user();

        $pivotRow = $user->exams()->where('exam_id', $exam_id)->first();

        $startTime = $pivotRow->pivot->created_at;

        $submitTime = Carbon::now();;
        $timeMins = $submitTime->diffInMinutes($startTime);

        if ($timeMins > $pivotRow->duration_mins) {
            $score = 0;
            // لو كان وقت التسليم اكر من مدة الامتحام ف نتيجة الطالب تساوي صفر
        }


        $user->exams()->updateExistingPivot($exam_id, [
            'score' => $score,
            'time_mins' => $timeMins,
        ]);

        $request->session()->flash("success", "you finished your exam successfully with score $score%");
        return redirect(url("exam/show/$exam_id"));
    }
}
