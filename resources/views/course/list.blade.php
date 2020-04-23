@extends('layouts.app')

@section('content')
    <h2 class="text-center">Turmas</h2>

    <div class="mt-2">
        <a class="btn btn-primary" href="{{ url('/course/create') }}">Adicionar nova turma</a>
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
                    <th scope="col">Turma</th>
                    <th scope="col" class="col-md-2" colspan=2></th>
                </tr>
            </thead>
            <tbody>
                @if($courses->count() == 0)
                    <tr>
                    <td scope="row" colspan=3>
                            Nenhuma turma cadastrada
                        </td>
                    </tr>
                @endif

                @foreach ($courses as $course)
                    <tr>
                        <td scope="row">
                            {{ $course->name }}
                        </td>
                        <td>
                            <a href="{{ url('course/edit/'.$course->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <button class="btn btn-danger course-delete" data-toggle="modal" data-target="#delete-modal-{{ $course->id }}" type="button">Excluir</button>

                            <!-- Modal -->
                            <div class="modal fade" id="delete-modal-{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="delete-modal-Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Deseja realmente exclui a turma?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                            <form action="{{ url('course/'.$course->id)}}" method="post">
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

    {{ $courses->links() }}
@endsection