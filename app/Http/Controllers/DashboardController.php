<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCourses = \App\Course::count();
        $totalStudents = \App\Student::count();

        return view('dashboard', ['totalCourses' => $totalCourses, 'totalStudents' => $totalStudents]);
    }
}
