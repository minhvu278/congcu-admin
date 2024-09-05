<div class="form-group">
    <x-input-label :value="$label" />

    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control">{{ old($name, $value) }}</textarea>

    <x-input-error :messages="$errors->get($name)" />
</div>
