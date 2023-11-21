@extends('admin.admin')

@section('title', $option ->exists ? 'Editer un option ' : 'Créer un option' )

@section('content')
@yield('title')

<form class="vstack gap-2" action="{{ route( $option ->exists ? 'admin.option.update' : 'admin.option.store', ['option' =>  $option ] ) }}" method="post">
    @csrf
    @method($option->exists ? 'put' : 'post')

    <div class=" row">
            @include('shared.input', [ 'class' => 'col' , 'label' => 'Nom de l\'option', 'name' => 'name', 'value' => $option->name] )     
    </div>
    @include('shared.submitBtn', [ 'value' =>  $option -> exists ? 'Editer' : 'Créer'  ] )        
   
</form>
@stop