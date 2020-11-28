<div class="form-group">
    <label for="title">Post Title</label>
    <input
        value="{{ $post->title ?? '' }}"
        class="form-control @error('post_title') is-invalid @enderror"
        type="text" name="post_title" placeholder="Enter post title" />
    @error('post_title')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Post Description</label>
    <textarea
        name="post_description" placeholder="Enter post description/content"
        class="form-control @error('post_description') is-invalid @enderror">{{ $post->description ?? '' }}</textarea>
    @error('post_description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="status">Post Status</label>
    <select name="post_status" class="form-control">
        <option value="0" {{ !$post->status ? 'selected' : '' }}>Draft</option>
        <option value="1" {{ $post->status ? 'selected' : '' }}>Publish</option>
    </select>
</div>

<div class="form-group">
    <input type="submit" value="Submit" class="btn btn-primary">
</div>
