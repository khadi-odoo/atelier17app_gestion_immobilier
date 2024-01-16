@extends('base')

@section('content')
<div class="container mt-5">


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
{{ $properties -> links() }}
@stop 