@extends('layouts.admin')

@section('content')


<div class="container my-container">
    <div class="row row-cols-2 ">

        {{-- colonna --}}
        <div class="col">

            <div class="px-2 bg-dark rounded-3 pb-1">

                <h2 class="py-3 text-white rounded-3 fw-bold fs-2 p-3 mt-3">Lista Tecnologie</h2>
                <table class="table rounded-3">
                    <thead>
                    <tr>
                        <th class="">Id</th>
                        <th class="">Name</th>
                        <th class="" scope="col">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($tecnologies as $technology)

                        <tr>
                            <form
                                action="{{ route('admin.technologies.update', $technology) }}"
                                method="POST"
                                id="edit-tech-{{ $technology->id }}">
                                @csrf
                                @method('PUT')
                                    <th>{{$technology->id}}</th>
                                    <td>
                                        <input
                                        class="transparent-input"
                                        type="text"
                                        name="name"
                                        value="{{ $technology->name }}"></td>
                                    <td>
                                        <button
                                            type="submit"
                                            class="btn btn-warning"
                                            onclick="submitForm({{$technology->id }})">
                                                <i class="fa-solid fa-pen"></i>
                                        </button>

                            </form>





                                        <form
                                            action="{{ route('admin.technologies.destroy', $technology) }}"
                                            method="POST"
                                            onsubmit="return confirm('Sei sicuro di voler eliminare {{ $technology->name }}?')"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- <div class="px-2 bg-dark rounded-3 pb-1">
                <h2 class="py-3 text-white rounded-3 fw-bold fs-2 p-3 mt-3">Lista Tecnologie</h2>

                <table class="table table-dark table-striped">
                  <thead>
                    <tr>
                      <th class="ps-3" scope="col">ID</th>
                      <th class="w-50" scope="col">Nome</th>
                      <th class="text-center" scope="col">Azioni</th>
                    </tr>
                  </thead>
                  <tbody>

                    @forelse ($tecnologies as $technology)
                      <tr>
                        <td class="ps-3">{{ $technology->id }}</td>

                        <form action="{{ route('admin.technologies.update', $technology) }}" method="POST"
                          id="edit-tech-{{ $technology->id }}">
                          @csrf
                          @method('PUT')
                          <td class="align-content-center">
                            <input class="transparent-input" type="text" name="name" value="{{ $technology->name }}">
                          </td>
                        </form>

                        <td class="text-center">
                          <button type="submit" class="btn btn-warning me-2"
                            onclick="sendEdit(`edit-tech-{{ $technology->id }}`)">
                            <i class="fa-solid fa-pen-to-square"></i>
                          </button>
                          <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST"
                            onsubmit="return confirm('Sei sicuro di voler eliminare {{ $technology->name }}?')"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                          </form>
                        </td>

                      </tr>

                  </tbody>
                </table>
            </div> --}}
        </div>


        {{-- colonna --}}
        <div class="col"></div>
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
