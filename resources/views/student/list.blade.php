@extends('layouts.app')

@section('content')
    <h2 class="text-center">Alunos</h2>

    <div class="mt-2">
        <a class="btn btn-primary" href="{{ url('/student/create') }}">Adicionar Aluno</a>
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
        <table class="table table-striped"">
            <thead>
                <tr>
                    <th scope="col">Aluno</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col" class="col-md-2" colspan=2></th>
                </tr>
            </thead>
            <tbody>
                @if($students->count() == 0)
                    <tr>
                    <td scope="row" colspan=3>
                            Nenhum aluno cadastrado
                        </td>
                    </tr>
                @endif

                @foreach ($students as $student)
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
                            <a href="{{ url('student/edit/'.$student->id) }}" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <button class="btn btn-danger delete" data-toggle="modal" data-target="#delete-modal-{{ $student->id }}" type="button">Excluir</button>

                            <!-- Modal -->
                            <div class="modal fade" id="delete-modal-{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="delete-modal-Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Deseja realmente excluir o aluno?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                            <form action="{{ url('student/'.$student->id)}}" method="post">
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
    </div>

    {{ $students->links() }}
@endsection