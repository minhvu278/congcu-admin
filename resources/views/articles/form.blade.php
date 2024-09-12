<x-input name="title" label="Title" :value="$article->title ?? ''"/>
<x-input name="slug" label="Slug" :value="$article->slug ?? ''"/>
<x-textarea name="content" label="Content" :value="$article->content ?? ''"/>
<x-input name="excerpt" label="Excerpt" :value="$article->excerpt ?? ''"/>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
    @if(isset($article) && $article->image)
        <img id="image-preview" src="{{ asset('storage/' . $article->image) }}" alt="Article Image" width="150">
    @else
        <img id="image-preview" src="" alt="Image Preview" style="display: none;" width="150">
    @endif
    @error('image')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<x-select name="category_id" label="Category" :options="$categories->pluck('name', 'id')" :value="$article->category_id ?? ''"/>

<!-- Multi select for tags -->
<div class="form-group">
    <label for="tags">Tags</label>
    <select name="tags[]" id="tags" class="form-control" multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}"
                    @if((is_array(old('tags')) && in_array($tag->id, old('tags'))) || (isset($article) && $article->tags->contains($tag->id)))
                    selected
                @endif>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>
    @error('tags')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<x-select name="status" label="Status" :options="['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived']" :value="$article->status ?? ''"/>

<div class="form-group">
    <label for="is_featured">
        <input type="hidden" name="is_featured" value="0">
        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $article->is_featured ?? false) ? 'checked' : '' }}> Featured
    </label>
    @error('is_featured')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<script>
    function previewImage(event) {
        let reader = new FileReader();
        reader.onload = function() {
            let output = document.getElementById('image-preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
