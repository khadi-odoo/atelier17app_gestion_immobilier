@extends('admin.admin')

@section('title', $bedRoom ->exists ? 'Editer un bien ' : 'Créer un bien' )

@section('content')
@yield('title')

<form class="vstack gap-2" action="{{ route( $bedRoom ->exists ? 'admin.bedRoom.update' : 'admin.BedRoom.store', ['bedRoom' =>  $bedRoom ] ) }}" method="post"  enctype="multipart/form-data"s  >
    @csrf
    @method($bedRoom->exists ? 'put' : 'post')

    <div class=" row">
            @include('shared.input', [ 'class' => 'col' , 'label' => 'Libele de la chambre', 'name' => 'name', 'value' => $bedRoom->title] )
            @include('shared.input', [ 'class' => 'col' ,  'label' => 'Surface', 'name' => 'surface', 'value' => $bedRoom->surface] )
            @include('shared.input', [ 'class' => 'col' ,  'label' => 'Nombre de chambre', 'name' => 'number', 'value' => $bedRoom->number] )
            @include('shared.input', [ 'class' => 'col' ,  'label' => 'Toilette', 'name' => 'toilet', 'value' => $bedRoom->toilet] )
    </div>
    <div class=" row-1 ">
        @include('shared.input', [ 'type' => 'textarea', 'name' => 'description', 'value' => $bedRoom->description] )

    </div>

   


    <div class="row justify-content-center" >
        @include('shared.select', [ 'name' => 'property_id', 'label' => 'Cliquer pour selectionner une Options : ',  'value' => $bedRoom->pluck('id'), 'values'=> $properties, 'multiple' => false] )     
    </div>
    <div class="row">
        @include('shared.checkbox', [ 'name' => 'balcony', 'label' => 'Balcon',  'value' => $bedRoom->balcony  ])         
    </div>

    <div class="row mt-3">
    @include('shared.submitBtn', [ 'value' =>  $bedRoom -> exists ? 'Editer' : 'Créer'  ] )        
    </div>
   

    {{-- <input class ="btn btn-primary" type="submit" value=" @if($bedRoom -> exists) Editer @else Créer @endif"> --}}
    {{-- <button class ="btn btn-primary" type="submit">
        @if($bedRoom -> exists) Editer @else Créer @endif"
    </button> --}}
   
</form>
@stop