<div class="card" >
    @if ($property->image)
    <img src="/storage/{{ $property->image }}" class="card-img-top" alt="">
     @endif
    <div class="card-body">
      <h5 class="card-title">{{ $property->title }}</h5>
      <p class="card-text">{{ $property -> description }}</p>
      <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}" class="btn btn-primary">Intéréssé ?</a>
      <p class="card-text">{{ $property->surface }}m² </p>
      <div class="text-primary fw-bold " style="font-size:1.4em;">
          {{ number_format($property->price, thousands_separator: '') }}FCFA
      </div>
    </div>
  </div>

