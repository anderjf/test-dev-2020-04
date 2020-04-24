<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function list($courseId)
    {
        $course = \App\Course::find($courseId);

        if (!$course) {
            return redirect('/registration')->with('error', 'Turma inválida!');
        }

        $registrationStudents = \App\Registration::select(DB::raw('students.*'))
                                    ->join('students', 'registrations.student_id', '=', 'students.id') 
                                    ->where('course_id', '=', $course->id)
                                    ->orderBy('students.name')
                                    ->get();

        return view('registration.list', ['course' => $course, 'registrationStudents' => $registrationStudents]);
    }

    public function edit($courseId)
    {
        $course = \App\Course::find($courseId);

        if (!$course) {
            return redirect('/registration')->with('error', 'Turma inválida!');
        }

        // Get all students available, that doesn't register in other courses
        $students = \App\Student::whereNotIn('id', \App\Registration::where('course_id', '<>', $course->id)->pluck('student_id'))
                ->orderBy('name')
                ->get();

        $registrations = \App\Registration::where('course_id', '=', $course->id)->get();

        $studentsChecked = [];
        foreach($registrations as $registration) {
            $studentsChecked[] = $registration->student_id;
        }

        return view('registration.edit', ['course' => $course, 'studentsChecked' => $studentsChecked, 'students' => $students]);
    }

    public function update(RegistrationRequest $requestFields, $courseId)
    {
        \App\Registration::where('course_id', '=', $courseId)->delete();

        foreach($requestFields->students as $studentId) {

            \App\Registration::create([
                'course_id' => $requestFields->course,
                'student_id' => $studentId,
            ]);
        }

        return redirect('/registration/'.$courseId)->with('success', 'Inscrição realizada!');
    }

    public function delete($courseId, $studentId)
    {
        $student = \App\Registration::where('course_id', '=', $courseId)
                                ->where('student_id', '=', $studentId)
                                ->first();
        $student->delete();

        return redirect('/registration/'.$courseId)->with('success', 'Estudante excluído da turma!');
    }
}
