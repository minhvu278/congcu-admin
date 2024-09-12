<x-input name="title" label="Title" :value="$news->title ?? ''"/>
<x-input name="slug" label="Slug" :value="$news->slug ?? ''"/>
<x-textarea name="content" label="Content" :value="$news->content ?? ''"/>

<!-- Image upload -->
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
    @if(isset($news) && $news->image)
        <img id="image-preview" src="{{ asset('storage/' . $news->image) }}" alt="News Image" width="150">
    @else
        <img id="image-preview" src="" alt="Image Preview" style="display: none;" width="150">
    @endif
    @error('image')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<x-select name="status" label="Status" :options="['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived']" :value="$news->status ?? ''"/>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image-preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
