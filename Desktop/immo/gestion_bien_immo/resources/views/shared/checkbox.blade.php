@php
    $class ??= null;
    $disabled ??= false;
@endphp

<div @class(['form-check form-switch', $class])>

    <input type="hidden" value = "0" name="{{ $name }}">
    <input class="form-check-input" 
        type="checkbox" 
        value="1" name="{{ $name }}" 
        id="{{ $name }}" @error($name) is-invalid @enderror 
        role = "switch" @checked (old($name, $value ?? false))
        @if ($disabled) @disabled(true) @endif
    >
    <label class="form-check-label" for="{{ $name }}"> {{ $label }} </label>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
