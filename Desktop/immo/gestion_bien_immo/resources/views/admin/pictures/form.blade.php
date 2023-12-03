@extends('admin.admin')

@section('title', $property ->exists ? 'Ajouter image à ce un bien ' : 'Créer un bien' )


@section('content')

<form class="vstack gap-2" action="{{ route( $property ->exists ? 'admin.property.update' : 'admin.property.store', ['property' =>  $property ] ) }}" method="post"  enctype="multipart/form-data"  >
    @csrf
    @method($property->exists ? 'put' : 'post')
    <h3>Ajouter l'image de la chambre correspondant à ce bien </h3>
    @include('shared.input', [ 'type' => 'file', 'class' => 'col' ,  'label' => 'Ajouter votre Image', 'name' => 'image' ] )   
    <div class="row mt-3">
        @include('shared.submitBtn', [ 'value' =>  $property -> exists ? 'Ajouter ' : 'Créer'  ] )        
        </div>
    <hr style="border-width: 5px; border-color: rgba(0, 132, 255, 0.396);"> 
    <h3>Information du bien </h3>
    
    @include('shared.forView.image', [ 'class' => 'card-img-top' , 'source' => 'property', 'width'=> '350', 'height' =>'350'  ] )
    <div class=" row">
        {{-- <img src="{{ $property->imageUrl() }}" class="card-img-top" alt=""> --}}
            @include('shared.input', [ 'class' => 'col' ,  'label' => 'Surface', 'name' => 'surface', 'value' => $property->surface, 'readonly'=>true ] )
            @include('shared.input', [ 'class' => 'col' ,  'label' => 'Prix', 'name' => 'price', 'value' => $property->price, 'readonly'=>true ] )   
    </div>
    <div class=" row-1 ">
        @include('shared.input', [ 'type' => 'textarea', 'name' => 'description', 'value' => $property->description, 'readonly'=>true ] )

    </div>
    
    <div class="row">
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Pieces', 'name' => 'rooms', 'value' => $property->rooms, 'readonly'=>true ] )
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Etage', 'name' => 'floor', 'value' => $property->floor, 'readonly'=>true ] )        
    </div>
   
    <div class="row">
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address, 'readonly'=>true] )        
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Vile', 'name' => 'city', 'value' => $property->city,'readonly'=>true ] )
        @include('shared.input', [ 'class' => 'col' , 'label' => 'Code Postal', 'name' => 'postal_code', 'value' => $property->postal_code, 'readonly'=>true] )        
    </div>

    <div class="row justify-content-center" >
        {{-- @include('shared.select', [ 'name' => 'options', 'label' => 'Cliquer pour selectionner une Options : ',  'value' => $property->options()->pluck('id'), 'values'=> $options, 'options'=> $options, 'multiple' => true, , 'readonly'=>true] )      --}}
    </div>
    <div class="row">
        @include('shared.checkbox', [ 'class' =>'col-pl-2', 'name' => 'sold', 'label' => 'Vendu',  'value' => $property->sold, 'disabled'=>true  ])     
        @include('shared.checkbox', [  'name' => 'green_area', 'label' => 'Espace vert',  'value' => $property->green_area, 'disabled'=>true  ])     
    </div>

   
   

    {{-- <input class ="btn btn-primary" type="submit" value=" @if($property -> exists) Editer @else Créer @endif"> --}}
    {{-- <button class ="btn btn-primary" type="submit">
        @if($property -> exists) Editer @else Créer @endif"
    </button> --}}
   
</form>
@stop