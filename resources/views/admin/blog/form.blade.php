<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="company_name">Title</label>
            <input type="text" name="title" class="form-control"
                   value="{{ isset($blog->title)?$blog->title:old('title') }}" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        @if(isset($blog) && isset($blog->image))
            <img src="{{ $blog->get_image() }}" alt="{{ $blog->title }}" style="width: 100px;">
        @endif
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" required>
                {!! isset($blog->content)?$blog->content:old('content') !!}
            </textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="author">Author's Name</label>
            <input type="text" name="author" class="form-control"
                   value="{{ isset($blog->author)?$blog->author:old('author') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="author_image">Author Image</label>
            <input type="file" class="form-control-file" name="author_image">
        </div>
        @if(isset($blog) && isset($blog->author_image))
            <img src="{{ $blog->get_author_image() }}" alt="{{ $blog->title }}" style="width: 100px;">
        @endif
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="author_description">Author's Description</label>
            <textarea name="author_description" cols="30" rows="7" class="form-control">
                {!! isset($blog->author_description)?$blog->author_description:old('author_description') !!}
            </textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="author_facebook_link">Author's Facebook link</label>
            <input type="text" class="form-control" name="author_facebook_link"
                   value="{{ isset($blog->author_facebook_link)?$blog->author_facebook_link:'' }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="author_google_link">Author's Google link</label>
            <input type="text" class="form-control" name="author_google_link"
                   value="{{ isset($blog->author_google_link)?$blog->author_google_link:'' }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="seo_title">SEO Title</label>
            <input type="text" name="seo_title" class="form-control"
                   value="{{ isset($blog->seo_title)?$blog->seo_title:old('seo_title') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="seo_description">SEO Description</label>
            <textarea name="seo_description" cols="30" rows="5" class="form-control">
                {!! isset($blog->seo_description)?$blog->seo_description:old('seo_description') !!}
            </textarea>
        </div>
    </div>



</div>