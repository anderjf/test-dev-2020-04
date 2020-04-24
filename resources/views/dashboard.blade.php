@extends('layouts.app')

@section('content')
    <div>
        <h2 class="text-center">Bem-vindo ao Test Dev</h2>
    </div>
    <div>
        <label>Total de turmas: {{ $totalCourses }}</label>
    </div>
    <div>
        <label>Total de alunos: {{ $totalStudents }}</label>
    </div>
@endsection
