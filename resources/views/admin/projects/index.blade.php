@extends('layouts.admin')


@section('content')

    <div class="container my-container">
        <div class="card">
            <div class="card-header my-intest">
                <h1 class="text-center ">I miei proggetti</h1>
            </div>

            @if(session('deleted'))
                <div class="alert alert-success" role="alert">
                {{ session('deleted')}}
                </div>
            @endif

            <div class="list-group list-group-flush ">
                <a class="d-flex justify-content-end  " href="{{route('admin.projects.create')}}">

                    <button class="btn btn-primary m-3"><i class="fa-solid fa-plus "></i></button>
                    {{-- Aggiungi Progetto --}}
                </a>
            </div>



            {{-- messaggio di aggiunta del progetto --}}
            @if(session('success'))
            <div class="alert alert-success my-3" role="alert">
               {{session('success')}}
            </div>
            @endif


            <table class="table">

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

                                <form
                                    action="{{route('admin.projects.update', $project)}}"
                                    method="POST"
                                    id="form-edit {{$project->id}}"
                                    >
                                    @csrf
                                    @method('PUT')
                                    <th class=" align-content-center ">
                                        <input
                                            type="text"
                                            class="form-control  @error('title') is-invalid @enderror"
                                            id="'title"
                                            name="title"
                                            value="{{$project->title}}">
                                    </th>

                                    <td class=" align-content-center ">
                                        <input
                                            type="text"
                                            class="form-control  @error('type') is-invalid @enderror"
                                            id="'type"
                                            name="type"
                                            value="{{$project->type}}">
                                    </td>

                                    <td class=" align-content-center ">
                                        <input
                                            type="text"
                                            class="form-control @error('link') is-invalid @enderror"
                                            id="'link"
                                            name="link"
                                            value="{{$project->link}}">
                                    </td>

                                    <td class="w-50 align-content-center">
                                        <textarea
                                            cols="30"
                                            rows="3"
                                            class="form-control "
                                            id="description"
                                            name="description"
                                            value="">{{$project->description}}</textarea>
                                    </td>

                                    <td class="d-flex justify-content-center align-items-center my-4 ">

                                            <button
                                                type="submit"
                                                class="btn btn-warning"
                                                onclick="submitForm({{$project->id}})">
                                                    <i class="fa-solid fa-pen"></i>
                                            </button>

                                </form>
                                            <form
                                                action="{{route('admin.projects.destroy', $project)}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                    <button
                                                        type="submit"
                                                        class="btn btn-danger mx-2"><i
                                                        class="fa-solid fa-trash"></i>
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

    </div>






    <script>
        function submitForm(id){
            const form = document.getElementById(`form-edit-${id}`);
            console.log(form);
            form.submit();
        }
    </script>

@endsection
