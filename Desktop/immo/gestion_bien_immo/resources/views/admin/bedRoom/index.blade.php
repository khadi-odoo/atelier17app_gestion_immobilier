@extends('admin.admin')

@section('title', 'Toute les chambres')
@section('content')

<div class="d-flex justify-content-between algin-items-center">
    <h1>@yield('title')</h1>
    <a href="{{route('admin.BedRoom.create')}}" class="btn btn-primary"> Ajouter</a>
</div>
<table class="table table-striped">

    <thead>
        <th>Libellé</th>
        <th>Surface</th>
        <th>Nombre de toilette</th>
        <th>Description</th>
        <th>Toilette</th>
        <th>Balcon</th>
        <th class="text-end">Action</th>
    </thead>

    <tbody>
        @foreach($bedRooms as $bedRoom)
        <tr>
            <td>{{ $bedRoom -> name }}</td>
            <td>{{ $bedRoom -> surface }}m²</td>
            <td>{{ $bedRoom -> surface }}</td>
          
            <td>
            {{-- @foreach($bedRoom -> bedRoom  as $option)
                {{ $option -> name }} <br>
            @endforeach --}}
        </td>
           
            <td> @include('shared.formBtn', [ 'method' =>'get', 'token' => false,  'value' => 'Editer', 'action' => 'admin.BedRoom.edit', 'argument' => $bedRoom ]) </td>
            <td> @include('shared.formBtn', [ 'anothermethod' => 'delete', 'class' => 'btn btn-danger', 'value' => 'Supprimer', 'action' => 'admin.BedRoom.destroy', 'argument' => $bedRoom ]) </td>
        </tr>
        @endforeach
    </tbody>
   
   
   
</table>
{{ $bedRooms -> links() }}
@stop