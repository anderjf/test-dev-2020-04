@extends('layouts.app')

@section('content')
    <h2 class="text-center">Estudantes</h2>

    <div class="mt-2">
        <a class="btn btn-primary" href="{{ url('/student') }}">Voltar</a>
    </div>

    <div class="mt-4">

        <h3>Adicionar Estudante</h3>
        <div class="d-flex align-items-start flex-wrap">
            <form action="/student" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="gender">Sexo</label>
                    <div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="genderM" name="gender" class="custom-control-input" value="M" @if(old('gender') == 'M') checked @endif >
                            <label class="custom-control-label" for="genderM">Masculino</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="genderF" name="gender" class="custom-control-input" value="F" @if(old('gender') == 'F') checked @endif >
                            <label class="custom-control-label" for="genderF">Feminino</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="birth">Data de Nascimento</label>
                    <input name="birth" id="dob" type="date" class="form-control" placeholder="Date of birth" value="{{ old('birth') }}"/>
                </div>

                <div class="form-group">
                    <input class="btn btn-success" type="Submit" value="Adicionar">
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
