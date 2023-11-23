@extends('admin.admin')

@section('title', 'Tous les options')
@section('content')

<div class="d-flex justify-content-between algin-items-center">
    <h1>@yield('title')</h1>
    <a href="{{route('admin.option.create')}}" class="btn btn-primary"> Ajouter</a>
</div>
<table class="table table-striped">

    <thead>
        <th>Nom</th>
   
        <th class="text-end">Action</th>
    </thead>

    <tbody>
        @foreach($options as $option)
        <tr>
            <td>{{ $option -> name }}</td>     
            <td> @include('shared.formBtn', [ 'method' =>'get', 'token' => false,  'value' => 'Editer', 'action' => 'admin.option.edit', 'argument' => $option ]) </td>
            <td> @include('shared.formBtn', [ 'anothermethod' => 'delete', 'class' => 'btn btn-danger', 'value' => 'Supprimer', 'action' => 'admin.option.destroy', 'argument' => $option ]) </td>
        </tr>
        @endforeach
    </tbody>
   
   
   
</table>
{{ $options -> links() }}
@stop