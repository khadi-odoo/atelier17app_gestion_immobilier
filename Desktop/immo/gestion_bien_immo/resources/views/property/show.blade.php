@extends('base')

@section('title', $property->title)

@section('content')
    <div class="container d-flex align-items-center justify-content-center min-vh-100">

        <div class="text-center">
            <h1>{{ $property->title }}</h1>
            <h2>{{ $property->rooms }} pièces - {{ $property->surface }}m²</h2>

            <div class="text-primary fw-bold" style="font-size: 4em;">
                <h1>{{ number_format($property->price) }} FCFA</h1>
            </div>

            <hr>

            <div class="mt-4">
                <h4>Intéressé par ce bien ?</h4>
            </div>

            <form action=" {{ route('property.contact', $property) }} " method="post">
                @csrf 
                @method('post')
                <div class="row mt-3 g-3">
                    @include('shared.input', ['class' => 'col', 'name' => 'firstname', 'label' => 'Nom', 'value' => 'jONh'])
                    @include('shared.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Prénom' ,'value' => 'jONh'])
                </div>

                <div class="row mt-3">
                    @include('shared.input', ['class' => 'col', 'name' => 'phone', 'label' => 'Téléphone' ,'value' => '784445454 '])
                </div>

                <div class="row mt-3">
                    @include('shared.input', [
                        'type' => 'email',
                        'class' => 'col',
                        'name' => 'email',
                        'label' => 'Email',
                        'value' => 'jONh@public.fr',
                    ])
                </div>
                
                @include('shared.input', ['type' => 'textarea','class' => 'col', 'name' => 'message','label' => 'Votre message'  ,'value' => 'mo super message'])
                <div class="row mt-3">
                    @include('shared.submitBtn', ['value' => 'Envoyer'])
                </div>

            </form>
        </div>

        <div class="mt-4 ml-4 card border-primary shadow">
            <div class="card-body">
                <p class=" bg-opacity-100"> <strong> Description :</strong> {{ $property->description }}</p>

                <div class="row ">
                    <div class="col-8">
                        <h4>Caractéristiques</h4>
                        <table class="table table-striped">
                            <tr>
                                <td>Ville</td>
                                <td>{{ $property->city }}</td>
                            </tr>
                            <tr>
                                <td>Surface habitable</td>
                                <td>{{ $property->surface }}</td>
                            </tr>
                            <tr>
                                <td>Pièces</td>
                                <td>{{ $property->rooms }}</td>
                            </tr>
                            <tr>
                                <td>Chambres</td>
                                <td>{{ $property->bedrooms }}</td>
                            </tr>
                            <tr>
                                <td>Étage</td>
                                <td>{{ $property->floor ?: 'Rez de chaussée' }}</td>
                            </tr>
                            <tr>
                                <td>Localisation</td>
                                <td>{{ $property->adress }}</td>
                            </tr>
                            <tr>
                                <td>Code Postal</td>
                                <td>{{ $property->postal_code }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-4">
                        <h4>Spécificités</h4>
                        <ul class="list-group">
                            @foreach ($property->options as $option)
                                <li class="list-group-item">{{ $option->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
