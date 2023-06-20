<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $data['students'] = Student::orderBy('id','asc')->paginate(5);
        return view('students.index', $data);
    }
    public function create(){
        return view('students.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required'
        ]);
         $student = new Student;
         $student->name = $request->name;
         $student->lastname = $request->lastname;
         $student->email = $request->email;
         $student->save();
         return redirect()->route('students.index')->with('success','Inserte Data Successfully !');
    }
    public function edit(Student $student){
        return view('students.edit', compact('student'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required'
        ]);
        $student = Student::find($id);
        $student->name = $request->name;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->save();
        return redirect()->route('students.index')->with('success','Update Data Successfully !');
    }
    public function destroy(Student $student){
        $student->delete();
        return redirect()->route('students.index')->with('success','Delete Data Successfully !');
    }
}
