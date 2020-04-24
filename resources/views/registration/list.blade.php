@extends('layouts.app')

@section('content')
    <h2 class="text-center">Inscrições</h2>

    <div class="mt-2">
        <a class="btn btn-secondary" href="{{ url('/course') }}">Voltar</a>
        <a class="btn btn-primary" href="{{ url('/registration/edit/'.$course->id) }}">Fazer Inscrição</a>
    </div>

    <div class="mt-4">

        @if(session()->get('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}  
            </div>
        @endif

        @if(session()->get('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}  
            </div>
        @endif
    </div>

    <div class="mt-4">
    
        <h3>Turma: {{ $course->name }}</h3>

        <table class="table table-striped"">
            <thead>
                <tr>
                    <th scope="col">Aluno</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col" class="col-md-1"></th>
                </tr>
            </thead>
            <tbody>
                @if($registrationStudents->count() == 0)
                    <tr>
                    <td scope="row" colspan=3>
                            Nenhum aluno inscrito
                        </td>
                    </tr>
                @endif

                @foreach ($registrationStudents as $student)
                    <tr>
                        <td scope="row">
                            {{ $student->name }}
                        </td>
                        <td scope="row">
                            {{ $student->gender }}
                        </td>
                        <td scope="row">
                            {{ date('d/m/Y', strtotime($student->birth)) }}
                        </td>
                        <td>
                            <button class="btn btn-danger delete" data-toggle="modal" data-target="#delete-modal-{{ $student->id }}" type="button">Excluir</button>

                            <!-- Modal -->
                            <div class="modal fade" id="delete-modal-{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="delete-modal-Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Deseja realmente excluir o aluno da turma?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                            <form action="{{ url('registration/'.$course->id.'/'.$student->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-primary" type="submit">Sim</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($errors->any())
            <div class="bg-danger text-white py-2 px-4">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection
