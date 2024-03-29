@php

    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
    $readonly ??= false;
@endphp
<div @class(['form-group', $class])>
    <label for="{{ $name }}"> {{ $label }} </label>
    @if ($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror " type="{{ $type }}" name="{{ $name }}"id="{{ $name }}"  @if ($readonly) @readonly(true) @endif> > 
            {{ old($name, $value) }} 
        </textarea>
    @else
        <input class="form-control @error($name) is-invalid @enderror " type="{{ $type }}"
            name="{{ $name }}" 
            id="{{ $name }}" 
            value="{{ old($name, $value) }}"
            @if ($readonly) @readonly(true) @endif>
    @endif
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
