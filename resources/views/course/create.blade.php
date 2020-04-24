@extends('layouts.app')

@section('content')
    <h2 class="text-center">Turmas</h2>

    <div class="mt-2">
        <a class="btn btn-primary" href="{{ url('/course') }}">Voltar</a>
    </div>

    <div class="mt-4">

        <h3>Adicionar Turma</h3>
        <div class="d-flex align-items-start flex-wrap">
            <form action="/course" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
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
