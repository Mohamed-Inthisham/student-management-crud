<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function getStudents(){
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }
    
    public function createStudent(){
        return view('students.createStudent');
    }
    public function store(Request $request){
        $data =$request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'age'=> 'required|numeric',
            'address'=>'nullable'
        ]);

        $newStudent = Student::create($data);
        return redirect(route('getStudents.index'))->with('success', 'Student record successfully added!');

    }

    public function editStudent(Student $student){
        return view('students.editStudent',['student'=> $student]);

    }

    public function updateStudent(Student $student , Request $request){
        $data =$request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'age'=> 'required|numeric',
            'address'=>'nullable'
        ]);
        $student->update($data);
        return redirect(route('getStudents.index'))->with('success', 'Student Updated SuccessFully');

    }
}
