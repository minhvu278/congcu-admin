<div class="form-group">
    <label for="{{ $name }}">{{ ucfirst($name) }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control ckeditor">{{ old($name, $value) }}</textarea>
</div>
