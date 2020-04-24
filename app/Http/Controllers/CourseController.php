<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function list()
    {
        $courses = \App\Course::orderBy('name')->paginate(5);

        return view('course.list', ['courses' => $courses]);
    }

    public function create() {
        return view('course.create');
    }

    public function register(CourseRequest $requestFields) {
        $course = \App\Course::create([
            'name' => $requestFields->name,
        ]);

        return redirect('/course')->with('success', 'Turma adicionda!');;
    }

    public function edit($id) {

        $course = \App\Course::find($id);

        if (!$course) {
            return redirect('/course')->with('error', 'Turma inválida!');
        }

        return view('course.edit', ['course' => $course]);
    }

    public function update(CourseRequest $requestFields, $id) {

        $course = \App\Course::find($id);
        $course->name = $requestFields->name;
        $course->save();

        return redirect('/course')->with('success', 'Turma atualizada!');
    }

    public function delete($id) {

        $course = \App\Course::find($id);
        $course->delete();

        return redirect('/course')->with('success', 'Turma excluída!');
    }
}
