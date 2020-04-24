@extends('layouts.app')

@section('content')
    <h2 class="text-center">Inscrições</h2>

    <div class="mt-2">
        <a class="btn btn-secondary" href="{{ url('registration/'.$course->id) }}">Voltar</a>
    </div>

    <div class="mt-4">
    
        <h3>Turma: {{ $course->name }}</h3>

        <form action="/registration/{{ $course->id }}" method="POST">
            @csrf

            <input type="hidden" name="course" value="{{ $course->id }}">

            <div class="form-group">

                @if($students->count() == 0)
                    <label for="course_id">Nenhum aluno disponível para inscrição</label>
                @else
                    <label for="course_id">Selecione os Alunos</label>
                @endif

                @foreach ($students as $student)

                    @if ($loop->index % 3 === 0)
                    <div class="form-row">
                    @endif

                        <div class="col">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="student-{{ $student->id }}" name="students[]" value="{{ $student->id }}"
                                    @if( is_array($studentsChecked) && in_array( $student->id, $studentsChecked)) checked @endif
                                >
                                <label class="custom-control-label" for="student-{{ $student->id }}">{{ $student->name }}</label>
                            </div>
                        </div>

                    @if ($loop->iteration % 3 === 0)
                    </div>
                    @endif
                @endforeach
            </div>

            <div class="form-group mt-4">
                <input class="btn btn-success" type="Submit" value="Adicionar">
            </div>
        </form>

        @if ($errors->any())
            <div class="bg-danger text-white py-2 px-4">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection
