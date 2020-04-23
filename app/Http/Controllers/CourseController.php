<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Traits\RegisterCourse;

class CourseController extends Controller
{
    use RegisterCourse;

    public function list()
    {
        $courses = \App\Course::orderBy('name')->paginate(5);

        return view('course.list', ['courses' => $courses]);
    }

    public function create() {
        return view('course.create');
    }

    public function register(CourseRequest $requestFields) {
        $this->registerCourse($requestFields);

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

        $this->updateCourse($id, $requestFields);

        return redirect('/course')->with('success', 'Turma atualizada!');
    }

    public function delete($id) {

        $this->deleteCourse($id);

        return redirect('/course')->with('success', 'Turma excluída!');
    }
}
