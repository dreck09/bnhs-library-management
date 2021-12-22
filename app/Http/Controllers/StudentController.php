<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Http\Requests\StudentCreateRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $student = Student::where('is_available','normal')->get();
        return view('admin-list-student',compact('student'), ['metaTitle'=>'Student List']);
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
        $student = Student::findorfail($id);
        return view('admin-edit-student',compact('student'),['metaTitle'=>'Edit Student Information']);
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

    public function archive($id)
    {
        $student = Student::findorfail($id);
        $student->is_available = "archived";
        $student->update();
        if($student){
            return back()->with('message', 'Student Archived!');
        }
    }

    public function archiveList()
    {
        $student = Student::where('is_available','archived')->get();
        return view('admin-archive-student',compact('student'), ['metaTitle'=>'Admin Archived Book List']);
    }

    public function deleteSelected(Request $request)
    {
        $sid = $request->id;
        Student::whereIn('id',$sid)->delete();
        return back()->with('message', 'Successfully Deleted!');
    }

}
