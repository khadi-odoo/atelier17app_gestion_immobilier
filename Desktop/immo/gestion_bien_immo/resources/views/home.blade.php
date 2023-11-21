@extends('base')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <h3>
            Fancy display heading
            <small class="text-muted">With faded secondary text</small>
          </h3>
    </div>
</div>

<div class="container">
    <h2>Nos derniers biens</h2>
    <div class="row">
        @foreach ($properties as $property)
        <div class="col">
            @include('property.card')
        </div>
        @endforeach
    </div>
</div>

@stop 