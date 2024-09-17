<div class="form-group">
    <label for="{{ $name }}">{{ ucfirst($name) }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" class="form-control" multiple>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ in_array($key, $selected) ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>
