@php

    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(['form-group', $class])">
    <label for="{{ $name }}"> {{ $label }} </label>
    
    <select name="{{ $name }}[]" id="{{ $name }}"   class="form-select " multiple aria-label="multiple select example">
        @foreach ($options as $key => $option)
            <option @selected($value->contains($key)) value="{{ $key }}"> {{ $option }} </option>
        @endforeach
    </select>
   

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
