@php 

$class ??= null;
$value ??= 'Send Me';
@endphp 

<button @class(["btn btn-primary", $class ]) type="submit" >
        {{ $value}}
</button>
