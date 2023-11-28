@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
    $values ??= '';
    $val ??= '';
    $multiple ??= 'multiple aria-label="multiple select example"';
@endphp
<div @class(['form-group', $class])">
    <label for="{{ $name }}"> {{ $label }} </label>
    
    <select name="{{ $name }}[]" id="{{ $name }}"   class="form-select " {{ $multiple }} >
        @foreach ($values as $key => $val)
            <option @selected($value->contains($key)) value="{{ $key }}"> {{ $val }} </option>
        @endforeach
    </select>
   

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
