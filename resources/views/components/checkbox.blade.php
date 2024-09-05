<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="{{ $name }}" name="{{ $name }}" {{ $checked ? 'checked' : '' }}>
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
    <x-input-error :messages="$errors->get($name)" />
</div>
