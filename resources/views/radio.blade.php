<input type="radio" name="{{ $name }}" class="{{ $class }} @error($name) is-invalid @enderror" value="{{ $value }}"
       placeholder="{{ $placeholder }}"
        {{ Form::attributes($attributes) }}
        {{ $required ? 'required' : '' }} {{ $checked ? 'checked' : '' }} @checked(old($name) === $value)>
@error($name)
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror