@extends('layouts.app')

@section('content')
    <h2 class="text-center">Alunos</h2>

    <div class="mt-2">
        <a class="btn btn-secondary" href="{{ url('/student') }}">Voltar</a>
    </div>

    <div class="mt-4">
    
        <h3>Alterar Aluno</h3>
        <div class="d-flex align-items-start flex-wrap">
            <form action="/student/{{ $student->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">
                </div>

                <div class="form-group">
                    <label for="gender">Sexo</label>
                    <div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="genderM" name="gender" class="custom-control-input" value="M" @if($student->gender == 'M') checked @endif >
                            <label class="custom-control-label" for="genderM">Masculino</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="genderM" name="gender" class="custom-control-input" value="M" @if($student->gender == 'M') checked @endif >
                            <label class="custom-control-label" for="genderF">Feminino</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="birth">Data de Nascimento</label>
                    <input name="birth" id="dob" type="date" class="form-control" placeholder="Date of birth" value="{{ $student->birth }}"/>
                </div>

                <div class="form-group">
                    <input class="btn btn-success" type="Submit" value="Alterar">
                </div>
            </form>
        </div>

        @if ($errors->any())
            <div class="bg-danger text-white py-2 px-4">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection
