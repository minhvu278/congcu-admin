<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control">{{ old($name, $value ?? '') }}</textarea>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
