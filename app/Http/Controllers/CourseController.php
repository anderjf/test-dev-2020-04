<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function list()
    {
        $courses = \App\Course::select(DB::raw('courses.*, count(student_id) as students_total'))
                                ->leftJoin('registrations', 'courses.id', '=', 'registrations.course_id')   
                                ->groupBy('courses.id')                 
                                ->orderBy('courses.name')
                                ->paginate(20);

        return view('course.list', ['courses' => $courses]);
    }

    public function create()
    {
        return view('course.create');
    }

    public function register(CourseRequest $requestFields)
    {
        $course = \App\Course::create([
            'name' => $requestFields->name,
        ]);

        return redirect('/course')->with('success', 'Turma adicionada!');
    }

    public function edit($id)
    {
        $course = \App\Course::find($id);

        if (!$course) {
            return redirect('/course')->with('error', 'Turma inválida!');
        }

        return view('course.edit', ['course' => $course]);
    }

    public function update(CourseRequest $requestFields, $id)
    {
        $course = \App\Course::find($id);
        $course->name = $requestFields->name;
        $course->save();

        return redirect('/course')->with('success', 'Turma atualizada!');
    }

    public function delete($id)
    {
        // Delete registrations of the course
        \App\Registration::where('course_id', '=', $id)->delete();

        // Delete course
        $course = \App\Course::find($id);
        $course->delete();

        return redirect('/course')->with('success', 'Turma excluída!');
    }
}
