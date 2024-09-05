<div class="form-group">
    <x-input-label :value="$label" />

    <select name="{{ $name }}{{ is_array($value) ? '[]' : '' }}" id="{{ $name }}" class="form-control" {{ is_array($value) ? 'multiple' : '' }}>
        @foreach($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ in_array($optionValue, (array) $value) ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    <x-input-error :messages="$errors->get($name)" />
</div>
