<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function getStudents(){
        return view('students.index');
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
        return redirect(route('getStudents.index'));

    }
}
