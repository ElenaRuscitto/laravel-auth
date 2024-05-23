@extends('layouts.admin')

@section('content')


<div class="container my-container">
    <div class="row row-cols-2 ">

        {{-- colonna Technology--}}
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

        </div>


        {{-- colonna Type--}}
        <div class="col">

            <div class="px-2 bg-dark rounded-3 pb-1">

                <h2 class="py-3 text-white rounded-3 fw-bold fs-2 p-3 mt-3">Lista Tipi</h2>
                <table class="table rounded-3">
                    <thead>
                    <tr>
                        <th class="">Id</th>
                        <th class="">Name</th>
                        <th class="" scope="col">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)

                        <tr>
                            <form
                                action="{{ route('admin.types.update', $type) }}"
                                method="POST"
                                id="edit-tech-{{ $type->id }}">
                                @csrf
                                @method('PUT')
                                    <th>{{$type->id}}</th>
                                    <td>
                                        <input
                                        class="transparent-input"
                                        type="text"
                                        name="name"
                                        value="{{ $type->name }}"></td>
                                    <td>
                                        <button
                                            type="submit"
                                            class="btn btn-warning"
                                            onclick="submitForm({{$type->id }})">
                                                <i class="fa-solid fa-pen"></i>
                                        </button>

                            </form>





                                        <form
                                            action="{{ route('admin.types.destroy', $type) }}"
                                            method="POST"
                                            onsubmit="return confirm('Sei sicuro di voler eliminare {{ $type->name }}?')"
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
