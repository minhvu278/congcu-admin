<div class="form-group">
    <label for="{{ $name }}">{{ ucfirst($name) }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control">{{ old($name, $value) }}</textarea>
</div>
