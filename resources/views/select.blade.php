<select name="{{ $name }}" class="{{ $class }} @error($name) is-invalid @enderror" {{ Form::attributes($attributes) }} {{ $required ? 'required' : '' }}>
    @foreach($options as $option)
        <option value="{{ $option['value'] }}" {{ $option['value'] == old($name, $value ?? '') ? 'selected' : '' }}>{{ $option['label'] }}</option>
    @endforeach
</select>
@error($name)
<span class="invalid-feedback">
    <strong>{{ $message }}</strong>
</span>
@enderror