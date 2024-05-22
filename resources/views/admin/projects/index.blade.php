@extends('layouts.admin')


@section('content')

    <div class="container my-container">
        <h1 class="text-center my-5">I miei proggetti</h1>

        <a class=" d-flex flex-end" href="{{route('admin.projects.create')}}">

                <i class="fa-solid fa-plus"></i>
                Aggiungi Progetto

        </a>

        {{-- messaggio di aggiunta del progetto --}}
        @if(session('success'))
        <div class="alert alert-success my-3" role="alert">
           {{session('success')}}
        </div>
        @endif


        <table class="table table-striped">

                <thead>
                <tr>

                    <th scope="col">Titolo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Link</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Azioni</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project )
                        <tr>

                            <th>{{$project->title}}</th>
                            <td>{{$project->type}}</td>
                            <td>{{$project->link}}</td>
                            <td class="w-50">{{$project->description}}</td>
                            <td class="d-flex">
                                <form action="" method="POST">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </form>

                                <form action="" method="POST">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>


                    @endforeach

                </tbody>


        </table>

        <div class="paginator">
            {{$projects->links()}}
        </div>
    </div>

@endsection
