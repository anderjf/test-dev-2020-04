<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    public function list()
    {
        $students = \App\Student::orderBy('name')->paginate(5);

        return view('student.list', ['students' => $students]);
    }

    public function create() {
        return view('student.create');
    }

    public function register(StudentRequest $requestFields) {

        $student = \App\Student::create([
            'name' => $requestFields->name,
            'gender' => $requestFields->gender,
            'birth' => $requestFields->birth,
        ]);

        return redirect('/student')->with('success', 'Estudante adicionado!');
    }

    public function edit($id) {

        $student = \App\Student::find($id);

        if (!$student) {
            return redirect('/student')->with('error', 'Estudante inválido!');
        }

        return view('student.edit', ['student' => $student]);
    }

    public function update(StudentRequest $requestFields, $id) {

        $student = \App\Student::find($id);
        $student->name = $requestFields->name;
        $student->gender = $requestFields->gender;
        $student->birth = $requestFields->birth;
        
        $student->save();

        return redirect('/student')->with('success', 'Estudante atualizado!');
    }

    public function delete($id) {

        $student = \App\Student::find($id);
        $student->delete();

        return redirect('/student')->with('success', 'Estudante excluído!');
    }
}
