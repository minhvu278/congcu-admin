@props(['name', 'label', 'type' => 'text', 'value' => '', 'options' => []])

<div class="form-group">
    <x-input-label :value="$label"></x-input-label>

    @if ($type === 'select')
        <select name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>
            @foreach($options as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}" {{ $value == $optionValue ? 'selected' : '' }}>{{ $optionLabel }}</option>
            @endforeach
        </select>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" {{ $attributes->merge(['class' => 'form-control']) }} />
    @endif

    <x-input-error :messages="$errors->get($name)"></x-input-error>
</div>
