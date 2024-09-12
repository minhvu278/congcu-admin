<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="text" name="{{ $name }}" id="{{ $name }}" class="form-control" value="{{ old($name, $value ?? '') }}">
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
