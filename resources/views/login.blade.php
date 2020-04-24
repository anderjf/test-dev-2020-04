@extends('layouts.app')

@section('content')
    <h2>Faça o login</h2>

    <div class="mt-4">

        @if(session()->get('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}  
            </div>
        @endif
    </div>

    <div class="mt-4">
        <div class="d-flex align-items-start flex-wrap">
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <input class="btn btn-success" type="Submit" value="Entrar">
                </div>
            </form>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-danger text-white py-2 px-4">
            @foreach ($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif
@endsection
