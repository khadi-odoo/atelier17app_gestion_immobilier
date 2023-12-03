@extends('admin.admin')

@section('title', 'Ajouter des images aux biens')
@section('content')

<div class="d-flex justify-content-between algin-items-center">
    <h1>@yield('title')</h1>
    <a href="{{route('admin.property.create')}}" class="btn btn-primary"> Liste des images d'un bien</a>
</div>
<table class="table table-striped">

    <thead>
        <th>Titre</th>
        <th>Surface</th>
        <th>Prix</th>
        <th>Ville</th>
        <th>Vendu</th>
        <th>Options</th>
        <th class="text-end">Action</th>
    </thead>
    <tbody>
        @foreach($properties as $property)
        <tr>
            <td>{{ $property -> title }}</td>
            <td>{{ $property -> surface }}m²</td>
            <td>{{ number_format($property -> price, thousands_separator: '') }}</td>
            <td>{{ $property -> city }}</td>
            <td>{{ $property -> sold === 1 ? 'VENDU' : 'EN VENTE' }}</td>
            <td>
                @foreach($property -> options  as $option)
                {{ $option -> name }} <br>
                @endforeach
            </td>
            
            <td> @include('shared.formBtn', [ 'method' =>'get', 'token' => false,  'value' => 'Ajouter une image', 'action' => 'admin.picture.create', 'argument' => $property ]) </td>
            {{-- <td> @include('shared.formBtn', [ 'method' =>'get', 'token' => false,  'value' => 'Editer', 'action' => 'admin.picture.create', 'argument' => $property ]) </td>

            <td> @include('shared.formBtn', [ 'anothermethod' => 'delete', 'class' => 'btn btn-danger', 'value' => 'Supprimer', 'action' => 'admin.picture.destroy', 'argument' => $property ]) </td> --}}
        </tr>
        @endforeach
    </tbody>
   
   
   
</table>
{{ $properties -> links() }}
@stop