@php
    $class ??= null;
    $name ??= '';
    $alt ??= '';
    $source ??= '';
    $dynamicImage = ${$source};
    $width ??= '100';
    $height ??= '100';
@endphp
<img src="" alt="" sizes="" srcset="">

<picture>

    {{-- <img src="{{ $source->imageUrl() }}" @class(['img-fluid', $class])  alt="{{ $alt }}"> --}}
 
    <img src=" {{ $dynamicImage->imageUrl() }} " @class(['img-fluid', $class])  alt="{{ $alt }}" style=" width: {{ $width }}px; height: {{ $height }}px; " >
</picture>

