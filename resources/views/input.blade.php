<input type="{{ $type }}" name="{{ $name }}" class="{{ $class }} @error($name) is-invalid @enderror" value="{{ old($name, $value) }}"
       placeholder="{{ $placeholder }}"
        {{ $attributes }}
        {{ $required ? 'required' : '' }}>
@error($name)
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
