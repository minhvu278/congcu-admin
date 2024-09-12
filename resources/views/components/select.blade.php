<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control">
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ old($name, $value ?? '') == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
