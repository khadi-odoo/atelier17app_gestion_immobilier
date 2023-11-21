@php
    $class ??= null;
    $action ??= '';
    $method ??= 'post';
    $anothermethod ??= $method;
    $token ??= true;
    $value ??= 'Edit Me';
    $argument ??= null;
@endphp


<form method="{{ $method }}" action="{{ route($action, $argument) }}">
    @if ($token)
        @csrf
        @method($anothermethod )
        <input @class(['btn btn-primary', $class]) type="submit" value="{{ $value }}">
    @else
        <input @class(['btn btn-primary', $class]) type="submit" value="{{ $value }}">
    @endif
</form>
