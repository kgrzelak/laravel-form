<textarea class="{{ $class }} @error($name) is-invalid @enderror" name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $attributes }} {{ $required ? 'required' : '' }}>{{ old($name, $value) }}</textarea>
@error($name)
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror