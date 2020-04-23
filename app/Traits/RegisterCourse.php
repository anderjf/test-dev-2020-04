<?php

namespace App\Traits;

trait RegisterCourse
{
    public function registerCourse($fields)
    {
        $course = \App\Course::create([
            'name' => $fields->name,
        ]);

        return $course;
    }

    public function updateCourse($id, $fields)
    {
        $course = \App\Course::find($id);
        $course->name = $fields->name;
        $course->save();

        return $course;
    }

    public function deleteCourse($id)
    {
        $course = \App\Course::find($id);
        $course->delete();
    }
}