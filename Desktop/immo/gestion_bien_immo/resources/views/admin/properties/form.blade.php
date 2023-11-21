@extends('admin.admin')

@section('title', $property ->exists ? 'Editer un bien ' : 'Créer un bien' )

@section('content')
@yield('title')

<form class="vstack gap-2" action="{{ route( $property ->exists ? 'admin.property.update' : 'admin.property.store', ['property' =>  $property ] ) }}" method="post">
    @csrf
    @method($property->exists ? 'put' : 'post')

    <div class=" row">
            @include('shared.input', [ 'class' => 'col' , 'label' => 'Titre', 'name' => 'title', 'value' => $property->title] )
            @include('shared.input', [ 'class' => 'col' ,  'label' => 'Surface', 'name' => 'surface', 'value' => $property->surface] )
            @include('shared.input', [ 'class' => 'col' ,  'label' => 'Prix', 'name' => 'price', 'value' => $property->price] )   
    </div>
    <div class=" row-1 ">
        @include('shared.input', [ 'type' => 'textarea', 'name' => 'description', 'value' => $property->description] )

    </div>
    
    <div class="row">
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Pieces', 'name' => 'rooms', 'value' => $property->rooms] )
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Chambre', 'name' => 'bedrooms', 'value' => $property->bedrooms] )
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Etage', 'name' => 'floor', 'value' => $property->floor] )        
    </div>

    <div class="row">
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address] )        
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Vile', 'name' => 'city', 'value' => $property->city] )
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Code Postal', 'name' => 'postal_code', 'value' => $property->postal_code] )        
    </div>

    <div class="row justify-content-center" >
        @include('shared.select', [ 'name' => 'options', 'label' => 'Cliquer pour selectionner une Options : ',  'value' => $property->options()->pluck('id'), 'options'=> $options, 'multiple' => true] )     
    </div>
    <div class="row">
        @include('shared.checkbox', [ 'name' => 'sold', 'label' => 'Vendu',  'value' => $property->sold  ])     
    </div>

    <div class="row mt-3">
    @include('shared.submitBtn', [ 'value' =>  $property -> exists ? 'Editer' : 'Créer'  ] )        
    </div>
   

    {{-- <input class ="btn btn-primary" type="submit" value=" @if($property -> exists) Editer @else Créer @endif"> --}}
    {{-- <button class ="btn btn-primary" type="submit">
        @if($property -> exists) Editer @else Créer @endif"
    </button> --}}
   
</form>
@stop