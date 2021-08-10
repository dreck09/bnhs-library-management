<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Http\Requests\StudentCreateRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $student = Student::get();
        return view('admin-list-student',compact('books'));
    }

    public function store(StudentCreateRequest $request)
    {
        $validate = $request->validated();
        $student = Student::create([
            'student_id' => $validate['student_id'],
            'fullname' => $validate['fullname'],
            'gender' => $validate['gender'],
            'grade_section' => $validate['grade_section'],
            'cpnumber' => $validate['cpnumber'],
        ]);
        return back()->with('message', 'Successfully Student Added!');
    }

    public function edit($id)
    {
        $student = Book::findorfail($id);
        return view('admin-edit-student',compact('book'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->student_id = $request->student_id;
        $student->fullname = $request->fullname;
        $student->gender = $request->gender;
        $student->grade_section = $request->grade_section;
        $student->cpnumber = $request->cpnumber;
        $student->update();
        return back()->with('message', 'Successfully Student Updated!');
    }

    public function destroy($id)
    {
        $student = Student::findorfail($id);
        $student->delete();
        return back()->with('message', 'Successfully Student Delete!');
    }
}
