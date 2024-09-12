<div class="form-group">
    <label for="{{ $name }}">
        <input type="checkbox" name="{{ $name }}" id="{{ $name }}" {{ old($name, $value ?? false) ? 'checked' : '' }}> {{ $label }}
    </label>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
