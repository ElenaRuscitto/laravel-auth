@extends('layouts.admin')


@section('content')

    <div class="container">
        <h1 class="text-center my-5">I miei proggetti</h1>

        <table class="table table-striped">

                <thead>
                <tr>

                    <th scope="col">Titolo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Link</th>
                    <th scope="col">Descrizione</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project )
                        <tr>

                            <th>{{$project->title}}</th>
                            <td>{{$project->type}}</td>
                            <td>{{$project->link}}</td>
                            <td class="w-50">{{$project->description}}</td>
                        </tr>
                    @endforeach

                </tbody>

        </table>

        <div class="paginator">
            {{$projects->links()}}
        </div>
    </div>

@endsection
