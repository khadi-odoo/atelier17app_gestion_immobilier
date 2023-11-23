@extends('base')

@section('title', 'Tous nos bien')

@section('content')
    {{-- {{  dd($input['price'])}} --}}
    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" name="price" placeholder="Buget max" class="form-control"
                value=" {{ $input['price'] ?? '' }} ">
            <input type="number" name="surface" placeholder="Surface minimale" class="form-control"
                value=" {{ $input['surface'] ?? '' }} ">
            <input type="number" name="rooms" placeholder="Nombre de pieces minimum" class="form-control"
                value=" {{ $input['rooms'] ?? '' }} ">
            <input type="text" name="title" placeholder="Mot clef" class="form-control"
                value=" {{ $input['title'] ?? '' }} ">

            <button class="btn-primary -btn-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>
    <div class="container">
        <div class="row">

            
            @forelse ($properties as $property)
                <div class="col-3 my-4">
                    @include('property.card')
                </div>
            @empty
                <div class="col text-center">
                    <h3>Aucun Bien ne correspond à votre recherche</h3>
                </div>
            @endforelse

        </div>

        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>


@stop
