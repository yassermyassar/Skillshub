<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class StudentController extends Controller
{
    public function index()
    {
        $role = Role::where('role', 'student')->first();

        $data['students'] = User::where('role_id', $role->id)->orderBy('id', 'DESC')->paginate(10);

        return view("admin.students.index")->with($data);
    }
    public function showScore($id)
    {

        $students = User::findOrFail($id);

        if ($students->role->role !== 'student') {
            return back();
        }

        $data['students'] = $students;
        $data['exams'] = $students->exams;
        return view("admin.students.showScore")->with($data);
    }
    public function openExam($examId, $studentId, Request $request)
    {
        $student = User::findOrFail($studentId);

        $student->exams()->updateExistingPivot($examId, [
            'status' => 'opened',
        ]);
        $request->session()->flash('msg', 'The Exam Updated Successfully');
        return back();
    }
    public function CloseExam($examId, $studentId, Request $request)
    {
        $student = User::findOrFail($studentId);

        $student->exams()->updateExistingPivot($examId, [
            'status' => 'closed',
        ]);
        $request->session()->flash('msg', 'The Exam Updated Successfully');
        return back();
    }
}
