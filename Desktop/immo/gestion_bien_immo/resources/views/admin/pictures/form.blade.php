@extends('admin.admin')

@section('title', $picture ->exists ? 'Editer un bien ' : 'Créer un bien' )

@section('content')
@yield('title')

@dump($property->id)
<form class="vstack gap-2" action="{{ route( $picture ->exists ? 'admin.property.update' : 'admin.picture.store', ['picture' =>  $picture ] ) }}" method="post"  enctype="multipart/form-data"  >
    @csrf
    @method($picture->exists ? 'put' : 'post')

    <div class=" row">
            @include('shared.input', [ 'type' => 'file', 'class' => 'col' ,  'label' => 'Ajouter votre Image', 'name' => 'image'] )   
            @include('shared.input', [ 'type' => 'hidden', 'class' => 'col' ,  'label' => '', 'name' => 'property_id', 'value' => $property->id] )
    </div>

    <div class="row mt-3">
    @include('shared.submitBtn', [ 'value' =>  $picture -> exists ? 'Editer' : 'Créer'  ] )
    </div>

    {{-- Affichage d'information déjà existant aucun traitement nest fais en dessous  --}}

    <hr style="border-width: 5px; border-color: rgba(0, 132, 255, 0.396);"> 
    <h3>Information du bien </h3>  
    @include('shared.input', [ 'class' => 'col' , 'name' => 'title', 'value' => $property->title ] )
    @include('shared.forView.image', [ 'class' => 'card-img-top' , 'source' => 'property', 'width'=> '350', 'height' =>'350'  ] )
    <div class=" row">
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

   
</form>
@stop